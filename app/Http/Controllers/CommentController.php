<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Video;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $type, $id)
    {
        $request->validate([
            'body' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $commentable = $type === 'videos' ? Video::findOrFail($id) : Post::findOrFail($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->commentable_id = $commentable->id;
        $comment->commentable_type = get_class($commentable);
        $comment->parent_id = $request->input('parent_id');
        $comment->save();

        return back();
    }


}
