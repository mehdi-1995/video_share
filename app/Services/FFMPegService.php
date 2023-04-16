<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FFMPegService
{
    private $ffmpeg;
    private $ffprobe;
    private $videoFrame;
    private $videoProbe;

    public function __construct(public string $path)
    {
        $this->ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe'
        ]);
        $this->ffprobe = \FFMpeg\FFProbe::create([
            'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe'
        ]);
        $this->videoFrame = $this->ffmpeg->open(Storage::path($path));

        $this->videoProbe = $this->ffprobe
            ->format(Storage::path($path));
    }
    public function getDuration()
    {
        return $this->videoProbe->get('duration');
    }
    public function getFrame()
    {
        $frame = $this->videoFrame->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1));
        $fileName = pathinfo($this->path, PATHINFO_FILENAME) . '.jpg';
        $frame->save(Storage::path("thumbnail/$fileName"));
        return $fileName;
    }
}
