<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Services\VideoService;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Http\Resources\VideoCollection;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function __construct(private VideoService $videoService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = Video::filter($request->all())->paginate();
        return new VideoCollection($videos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        $this->videoService->store(auth()->user(), $request->all());
        return response()->json([
            'massage' => 'success', 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return (new VideoResource($video));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $this->authorize('update', $video);
        $this->videoService->update($request->all(), $video);
        return response()->json([
            'massage' => 'success', 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $this->authorize('delete', $video);
        $video->delete();
    }
}
