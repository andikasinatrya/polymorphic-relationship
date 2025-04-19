<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $type, $id)
{
    $request->validate(['body' => 'required']);

    $model = match ($type) {
        'posts' => \App\Models\Post::class,
        'videos' => \App\Models\Video::class,
        default => abort(404),
    };

    $commentable = $model::findOrFail($id);
    $commentable->comments()->create([
        'body' => $request->body,
    ]);

    return back();
}

}
