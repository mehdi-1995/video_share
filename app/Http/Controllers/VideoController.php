<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\VideoService;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function __construct(private VideoService $videoService)
    {
    }
    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }
    public function store(StoreVideoRequest $request)
    {
        $this->videoService->store($request->user(), $request->all());
        return redirect()->route('index')->with('success', __('message.store'));
    }
    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('videos.edit', compact('video', 'categories'));
    }
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $this->videoService->update($request->all(), $video);
        return redirect()->route('video.show', $video)->with('success', __('message.update'));
    }
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }
    public function destroy(Video $video)
    {
        $video->delete();
        return back();
    }
}
