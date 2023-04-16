<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(CommentRequest $request, Video $video)
    {
        $video->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $request->body
        ]);
        return back();
    }
}
