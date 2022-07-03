<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Feed;
use App\Models\User;

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

        $response['message'] = "Comment added successfully";
        // $response['data'] = $comment;

        return $response;
    }
}
