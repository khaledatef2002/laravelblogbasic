<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(StoreCommentRequest $req)
    {
        $data = $req->validated();

        Comment::create($data);

        return back()->with('comments-status', 'Comment has been published successfully');
    }
}
