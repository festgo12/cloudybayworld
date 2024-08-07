<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\sendMessage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Message\Facades\MessageMessenger as Message;
use App\Models\ChMessage as Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ChFavorite as Favorite;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request as FacadesRequest;


class MessageController extends Controller
{
    /**
     * Authinticate the connection for pusher
     *
     * @param Request $request
     * @return void
     */
    public function pusherAuth(Request $request)
    {
        // Auth data
        $authData = json_encode([
            'user_id' => Auth::user()->id,
            'user_info' => [
                'name' => Auth::user()->username
            ]
        ]);
        // check if user authorized
        if (Auth::check()) {
            $message = new Message();
            return $message->pusherAuth(
                $request['channel_name'],
                $request['socket_id'],
                $authData
            );
            return true;
        }
        // if not authorized
        return new Response('Unauthorized', 401);
    }

    /**
     * Returning the view of the app with the required data.
     *
     * @param int $id
     * @return void
     */
    // public function index( $username = null, $fakeSlug = null)
    public function index( $id = null)
    {
        $routeName= FacadesRequest::route()->getName();
        $route = (in_array($routeName, ['user', config('chat.routes.prefix')]))
            ? 'user'
            : $routeName;

            // $user = User::where('username', $username)->first();
            // $id = $user->id;
        // dd($route);

        // prepare id
        return view('chat.pages.app', [
            // 'id' => ($id == null) ? 0 : $route . '_' . $id,
            'id' => ($id == null) ? 0 :  $id,
            'route' => $route,
            'type' => 'user',
            'messengerColor' => Auth::user()->messenger_color,
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }


    /**
     * Fetch data by id for (user/group)
     *
     * @param Request $request
     * @return collection
     */
    public function idFetchData(Request $request)
    {
        // Favorite
        $favorite = Favorite::inFavorite($request['id']);

        // User data
        if ($request['type'] == 'user') {
            $fetch = User::where('id', $request['id'])->first();
            $following = $fetch->following->count();
            $followers = $fetch->followers->count();
        }

        // $user = User::where('username', $username)->first();

        // send the response
        return Response::json([
            'favorite' => $favorite,
            'following' => $following,
            'followers' => $followers,
            'fetch' => $fetch,
            'user_avatar' => asset('/assets/uploads/' . config('chat.user_avatar.folder') . '/' . $fetch->avatar),
        ]);
    }

    /**
     * This method to make a links for the attachments
     * to be downloadable.
     *
     * @param string $fileName
     * @return void
     */
    public function download($fileName)
    {
        $path = public_path() . '/assets/uploads/' . config('chat.attachments.folder') . '/' . $fileName;
        // $path = asset('/assets/uploads/' . config('chat.attachments.folder') . '/' . $fileName);
        if (file_exists($path)) {
            return Response::download($path, $fileName);
        } else {
            return abort(404, "Sorry, File does not exist in our server or may have been deleted!");
        }
    }

    /**
     * Send a message to database
     *
     * @param Request $request
     * @return JSON response
     */
    public function send(Request $request)
    {
        // default variables
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;
        $message = new Message();

        // if there is attachment [file]
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = $message->getAllowedImages();
            $allowed_files  = $message->getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
            // if size less than 150MB
            if ($file->getSize() < 150000000) {
                if (in_array($file->getClientOriginalExtension(), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                    // $file->storeAs("public/" . config('chat.attachments.folder'), $attachment);
                    $file->move( public_path() . '/assets/uploads/' . config('chat.attachments.folder'), $attachment);
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File is too big!";
            }
        }

        $messageID = mt_rand(9, 999999999) + time();

        if (!$error->status) {
            // send to database
            $message->newMessage([
                'id' => $messageID,
                'type' => $request['type'],
                'from_id' => Auth::user()->id,
                'to_id' => $request['id'],
                'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                'attachment' => ($attachment) ? json_encode((object)[
                    'new_name' => $attachment,
                    'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                ]) : null,
            ]);

            // fetch message to send it with the response
            $messageData = $message->fetchMessage($messageID);

            // send to user using pusher
            // $message->pushEvent('private-chat', 'messaging', [
            //     'from_id' => Auth::user()->id,
            //     'to_id' => $request['id'],
            //     'message' => $message->messageCard($messageData, 'default')
            // ]);
            $data = [
                        'from_id' => Auth::user()->id,
                        'to_id' => $request['id'],
                        'message' => $message->messageCard($messageData, 'default')
                    ];

            // event(new sendMessage($data));

            // return $data;



        }

        // send the response
        return Response::json([
            'status' => '200',
            'error' => $error,
            'message' => $message->messageCard($message->fetchMessage($messageID)),
            'tempID' => $request['temporaryMsgId'],
            'eventdata' => $data,
        ]);
    }

    /**
     * fetch [user/group] messages from database
     *
     * @param Request $request
     * @return JSON response
     */
    public function fetch(Request $request)
    {
        // messages variable
        $msg = new Message();
        $allMessages = null;

        // fetch messages
        $query = $msg->fetchMessagesQuery($request['id'])->orderBy('created_at', 'asc');
        $messages = $query->get();

        // if there is a messages
        if ($query->count() > 0) {
            foreach ($messages as $message) {
                $allMessages .= $msg->messageCard(
                    $msg->fetchMessage($message->id)
                );
            }
            // send the response
            return Response::json([
                'count' => $query->count(),
                'messages' => $allMessages,
            ]);
        }
        // send the response
        return Response::json([
            'count' => $query->count(),
            'messages' => '<p class="message-hint center-el"><span>Say \'hi\' and start messaging</span></p>',
        ]);
    }

    /**
     * Make messages as seen
     *
     * @param Request $request
     * @return void
     */
    public function seen(Request $request)
    {
        $msg = new Message();
        // make as seen
        $seen = $msg->makeSeen($request['id']);
        // send the response
        return Response::json([
            'status' => $seen,
        ], 200);
    }

    /**
     * Get contacts list
     *
     * @param Request $request
     * @return JSON response
     */
    public function getContacts(Request $request)
    {
        $msg = new Message();
        // get all users that received/sent message from/to [Auth user]
        $users = $msg->join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
                ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) {
            $q->where('ch_messages.from_id', Auth::user()->id)
              ->orWhere('ch_messages.to_id', Auth::user()->id);
        })
        ->orderBy('ch_messages.created_at', 'desc')
        ->get()
        ->unique('id');

        $contacts = '<p class="message-hint center-el"><span>Your contact list is empty</span></p>';
        $users = $users->where('id','!=',Auth::user()->id);
        if ($users->count() > 0) {
            // fetch contacts
            $contacts = '';
            foreach ($users as $user) {
                if ($user->id != Auth::user()->id) {
                    // Get user data
                    $userCollection = User::where('id', $user->id)->first();
                    $contacts .= $msg->getContactItem($request['messenger_id'], $userCollection);
                }
            }
        }

        // send the response
        return Response::json([
            'contacts' => $contacts,
        ], 200);
    }

    /**
     * Update user's list item data
     *
     * @param Request $request
     * @return JSON response
     */
    public function updateContactItem(Request $request)
    {
        $msg = new Message();
        // Get user data
        $userCollection = User::where('id', $request['user_id'])->first();
        $contactItem = $msg->getContactItem($request['messenger_id'], $userCollection);

        // send the response
        return Response::json([
            'contactItem' => $contactItem,
        ], 200);
    }

    /**
     * Put a user in the favorites list
     *
     * @param Request $request
     * @return void
     */
    public function favorite(Request $request)
    {
        // check action [star/unstar]
        if (Favorite::inFavorite($request['user_id'])) {
            // UnStar
            Favorite::makeInFavorite($request['user_id'], 0);
            $status = 0;
        } else {
            // Star
            Favorite::makeInFavorite($request['user_id'], 1);
            $status = 1;
        }

        // send the response
        return Response::json([
            'status' => @$status,
        ], 200);
    }

    /**
     * Get favorites list
     *
     * @param Request $request
     * @return void
     */
    public function getFavorites(Request $request)
    {
        $favoritesList = null;
        $favorites = Favorite::where('user_id', Auth::user()->id);
        foreach ($favorites->get() as $favorite) {
            // get user data
            $user = User::where('id', $favorite->favorite_id)->first();
            $favoritesList .= view('chat.layouts.favorite', [
                'user' => $user,
            ]);
        }
        // send the response
        return Response::json([
            'count' => $favorites->count(),
            'favorites' => $favorites->count() > 0
                ? $favoritesList
                : 0,
        ], 200);
    }

    /**
     * Search in messenger
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $getRecords = null;
        $input = trim(filter_var($request['input'], FILTER_SANITIZE_STRING));
        // $input = trim($request['input']);
        $records = User::where('username', 'LIKE', "%{$input}%")
        ->orWhere('firstname', 'LIKE', "%{$input}%")->orWhere('lastname', 'LIKE', "%{$input}%")->get();
        foreach ($records as $record) {
            $getRecords .= view('chat.layouts.listItem', [
                'get' => 'search_item',
                'type' => 'user',
                'user' => $record,
            ])->render();
        }
        // dd($records, $getRecords);
        // send the response
        return Response::json([
            'records' => $records->count() > 0
                ? $getRecords
                : '<p class="message-hint center-el"><span>Nothing to show.</span></p>',
            'addData' => 'html'
        ], 200);
    }

    /**
     * Get shared photos
     *
     * @param Request $request
     * @return void
     */
    public function sharedPhotos(Request $request)
    {
        $msg = new Message();
        $shared = $msg->getSharedPhotos($request['user_id']);
        $sharedPhotos = null;

        // shared with its template
        for ($i = 0; $i < count($shared); $i++) {
            $sharedPhotos .= view('chat.layouts.listItem', [
                'get' => 'sharedPhoto',
                'image' => $shared[$i],
            ])->render();
        }

        // dd($sharedPhotos);
        // send the response
        return Response::json([
            'shared' => count($shared) > 0 ? $sharedPhotos : '<p class="message-hint"><span>Nothing shared yet</span></p>',
        ], 200);
    }

    /**
     * Delete conversation
     *
     * @param Request $request
     * @return void
     */
    public function deleteConversation(Request $request)
    {
        // delete
        $delete = (new Message)->deleteConversation($request['id']);

        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }


    /**
     * Delete conversation
     *
     * @param Request $request
     * @return void
     */
    public function deleteMessage(Request $request)
    {
      

        $msg = Message::where('id',$request['id'])->first();

        if (isset($msg->attachment)) {
            $path = public_path('assets/uploads/'.config('chat.attachments.folder').'/'.json_decode( $msg->attachment)->new_name);

            if(File::exists($path)){
                $delete = File::delete($path);
            }
        }
        // delete from database
       $delete = $msg->delete();


        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }

    public function updateSettings(Request $request)
    {
        $msg = null;
        $error = $success = 0;
        $msgClass = new Message();

        // dark mode
        if ($request['dark_mode']) {
            $request['dark_mode'] == "dark"
                ? User::where('id', Auth::user()->id)->update(['dark_mode' => 1])  // Make Dark
                : User::where('id', Auth::user()->id)->update(['dark_mode' => 0]); // Make Light
        }

        // If messenger color selected
        if ($request['messengerColor']) {

            $messenger_color = explode('-', trim(filter_var($request['messengerColor'], FILTER_SANITIZE_STRING)));
            // $messenger_color = explode('-', trim($request['messengerColor']));
            $messenger_color = $msgClass->getMessengerColors()[$messenger_color[1]];
            User::where('id', Auth::user()->id)
                ->update(['messenger_color' => $messenger_color]);
        }
        // if there is a [file]
        if ($request->hasFile('avatar')) {
            // allowed extensions
            $allowed_images = $msgClass->getAllowedImages();

            $file = $request->file('avatar');
            // if size less than 150MB
            if ($file->getSize() < 150000000) {
                if (in_array($file->getClientOriginalExtension(), $allowed_images)) {
                    // delete the older one
                    if (Auth::user()->avatar != config('chat.user_avatar.default')) {
                        $path = public_path('/assets/uploads/' . config('chat.user_avatar.folder') . '/' . Auth::user()->avatar);

                        if (file_exists($path)) {
                            @unlink($path);
                        }
                    }
                    // upload
                    $avatar = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $update = User::where('id', Auth::user()->id)->update(['avatar' => $avatar]);
                    $file->move( public_path() . '/assets/uploads/' . config('chat.user_avatar.folder'), $avatar);
                    $success = $update ? 1 : 0;
                } else {
                    $msg = "File extension not allowed!";
                    $error = 1;
                }
            } else {
                $msg = "File extension not allowed!";
                $error = 1;
            }
        }

        // send the response
        return Response::json([
            'status' => $success ? 1 : 0,
            'error' => $error ? 1 : 0,
            'message' => $error ? $msg : 0,
        ], 200);
    }

    /**
     * Set user's active status
     *
     * @param Request $request
     * @return void
     */
    public function setActiveStatus(Request $request)
    {
        $update = $request['status'] > 0
            ? User::where('id', $request['user_id'])->update(['active_status' => 1])
            : User::where('id', $request['user_id'])->update(['active_status' => 0]);
        // send the response
        return Response::json([
            'status' => $update,
        ], 200);
    }
}
