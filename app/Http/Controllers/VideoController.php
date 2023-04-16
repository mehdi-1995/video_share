<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Category;
use App\Services\VideoService;
use Illuminate\Http\Request;

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
}
