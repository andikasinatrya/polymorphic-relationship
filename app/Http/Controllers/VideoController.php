<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('video.index', compact('videos'));
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url'
        ]);

        Video::create($request->only('title', 'url'));

        return redirect()->route('videos.index')->with('success', 'Video created!');
    }

    public function show(Video $video)
    {
        return view('video.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url'
        ]);

        $video->update($request->only('title', 'url'));

        return redirect()->route('videos.index')->with('success', 'Video updated!');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted!');
    }
}
