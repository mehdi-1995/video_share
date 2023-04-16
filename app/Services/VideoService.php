<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    public function store(User $user, array $params)
    {
        $path = Storage::putFile('', $params['path']);
        $ffmpegService = new ffmpegService($path);
        $params['path'] = $path;
        $params['thumbnail'] = $ffmpegService->getFrame();
        $params['duration'] = $ffmpegService->getDuration();
        $user->videos()->create($params);
    }
    public function upload()
    {
    }
}
