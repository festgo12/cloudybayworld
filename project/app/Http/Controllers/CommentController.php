<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Shop;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\commentCreated;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $comment = new Comment;
        $comment->content = $request->post('content');
        $comment->user()->associate(User::find($request->post('userId')));
        $feed = Feed::find($request->post('feedId'));
        $feed->comments()->save($comment);


        // getting the notifiable profile/shop for post comment  

        if($feed->feedable_type == 'User'){

            $feedable_user = User::where('id', $feed->feedable_id)->first();

            $feedable_user->notify(new commentCreated($feed, $comment));
       

            
        }elseif($feed->feedable_type == 'Shop')
        {
            
            $shop = Shop::where('id', $feed->feedable_id)->first();
            $vendorUser = User::where('id', $shop->user_id)->first();

            $vendorUser->notify(new commentCreated($feed, $comment));

            
        }

        // $comments = Comment::where('commentable_id', $request->post('feedId'))->get();
        // $users = User::where('id', $comments)->where('id', '!=', auth()->user()->id)->get();

        // foreach($comments as $com){

        // }

        // Notification::send($users, new commentCreated($feed, $comment));


        $response['message'] = "Comment added successfully";
        $response['data'] = $comment;

        return $response;
    }

    public function getComment($feedId){
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $comments = Comment::where('commentable_id', $feedId)
            ->orderByDesc('id')
            ->with('user')
            ->get();
        $response['data'] = $comments;

        return $response;
    }
}
