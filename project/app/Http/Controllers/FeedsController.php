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
            ->with(['isLikedBy' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
            ->orderByDesc('id')
            ->get();
        return $feeds;
    }

    public function postFeed(Request $request, $userId)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $validator = Validator::make($request->all(), [
            'postInput' => 'string|max:255',
            'fileInput' => 'required|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        /**
         * Set error true if the rules are not followed 
         * Set the error message from the validator to the response object
         */
        if ($validator->fails()) {
            $response['message'] = implode("<br>", $validator->messages()->all());
            $response['error'] = true;
        }

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
                $path = $file->store('', 'uploads');
                $name = $file->getClientOriginalName();
                // store the image path, name and type on the DB
                array_push($attachments, [
                    'path' => $path,
                    'type' => 'image',
                    'name' => $name
                ]);
            }
            $feed->attachments = $attachments;
        }

        $feed->save();
        $response['message'] = "Post added successfully";
        $response['data'] = $feed;

        return $response;
    }

    public function likeFeed(Request $request)
    {
        $feed = Feed::find($request->post('feedId'));
        return $feed->like($request->post('userId'));
    }
}
