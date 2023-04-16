<?php

namespace App\Services;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class VideoService
{
    public function store(User $user, array $data)
    {
        $data = $this->putFile($data);
        $user->videos()->create($data);
    }
    public function update(array $data, Video $video)
    {
        if (isset($data['path']) && $data['path'] instanceof File) {
            $data = $this->putFile($data);
        }
        $video->update($data);
    }
    public function putFile(array $data)
    {
        $path = Storage::putFile('', $data['path']);
        $ffmpegService = new ffmpegService($path);
        $data['path'] = $path;
        $data['thumbnail'] = $ffmpegService->getFrame();
        $data['duration'] = $ffmpegService->getDuration();
        return $data;
    }
}
