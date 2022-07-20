<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Feed;
use App\Models\User;

class FeedsController extends Controller
{
    public function getFeeds()
    {
        $user = Auth::user();
        return view('feeds.feeds')->with('user', $user);
        ;
    }

    public function apiGetFeeds($userId)
    {
        $user = User::find($userId);

        $feeds = Feed::whereIn('user_id', $user->following->pluck('id'))
            ->orWhere('user_id', $userId)
            ->with('user')
            ->with('likes')
            ->with([
                'isLikedBy' => function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                }
            ])
            ->with([
                'comments' => function ($query){
                    $query->orderByDesc('id')->with('user');
                }
            ])
            ->withCount('comments as total_comments')
            ->orderByDesc('id')
            ->get();
        return $feeds;
    }

    public function apiGetProfileFeeds($username)
    {
        $user = User::where('username', $username)->first();
        $userId = $user->id;

        $feeds = Feed::whereIn('id', $user->likes->pluck('feed_id'))
            ->orWhere('user_id', $userId)
            ->with('user')
            ->with('likes')
            ->with([
                'isLikedBy' => function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                }
            ])
            ->with([
                'comments' => function ($query){
                    $query->orderByDesc('id')->with('user');
                }
            ])
            ->withCount('comments as total_comments')
            ->orderByDesc('id')
            ->get();
        return $feeds;
    }

    public function postFeed(Request $request, $userId)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $validator = Validator::make($request->all(), [
            'postInput' => 'required|string|max:255',
            'fileInput' => 'max:2048',
        ]);

        $requiredMemeTypes = ['video/x-ms-asf', 'video/x-flv', 'video/mp4', 'application/x-mpegURL',
            'video/MP2T', 'video/3gpp', 'video/quicktime', 'video/x-msvideo', 'video/x-ms-wmv', 
            'video/avi', 'video/webm', 'image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/webp'];

        /**
         * Set error true if the rules are not followed 
         * Set the error message from the validator to the response object
         */
        if ($validator->fails()) {
            $response['message'] = implode("<br>", $validator->messages()->all());
            $response['error'] = true;
        }else{
            // create a new Feed object
            $feed = new Feed();
            $feed->content = $request->post('postInput');
            // create a new unique string for the slug
            $bytes = random_bytes(20);
            $slug = bin2hex($bytes);
            $feed->slug = $slug;
            $feed->user_id = $userId;

            // check if an image was uploaded        
            if ($request->hasfile('fileInput')) {
                $attachments = [];
                foreach ($request->file('fileInput') as $file) {
                    // check if video/image has an accepted mime type
                    if(!(in_array($file->getMimeType(), $requiredMemeTypes))){
                        $response['message'] = "Please upload a valid image/video file";
                        $response['error'] = true;
                        return $response;
                    }
                    $path = $file->store('', 'uploads');
                    $name = $file->getClientOriginalName();
                    // store the image path, name and type on the DB
                    array_push($attachments, [
                        'path' => $path,
                        'type' => str_contains($file->getMimeType(), 'video') ? 'video':'image',
                        'name' => $name
                    ]);
                }
                $feed->attachments = $attachments;
            }

            $feed->save();
            $response['message'] = "Post added successfully";
            $response['data'] = $feed;
        }

        return $response;
    }

    public function likeFeed(Request $request)
    {
        $feed = Feed::find($request->post('feedId'));
        return $feed->like($request->post('userId'));
    }
}
