<?php

namespace App\Observers;

use App\Models\video;
use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    /**
     * Handle the video "created" event.
     */
    public function created(video $video): void
    {
        //
    }

    /**
     * Handle the video "updated" event.
     */
    public function updated(video $video): void
    {
        if ($video->wasChanged('path') && $video->wasChanged('thumbnail')) {
            Storage::delete($video->getOriginal('path'));
            Storage::delete('thumbnail/' . $video->getOriginal('thumbnail'));
        }
    }

    /**
     * Handle the video "deleted" event.
     */
    public function deleted(video $video)
    {
        if ($video->trashed()) return true;
        Storage::delete($video->getOriginal('path'));
        Storage::delete('thumbnail/' . $video->getOriginal('thumbnail'));
    }

    /**
     * Handle the video "restored" event.
     */
    public function restored(video $video): void
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     */
    public function forceDeleted(video $video): void
    {
        Storage::delete($video->getOriginal('path'));
        Storage::delete('thumbnail/' . $video->getOriginal('thumbnail'));
    }
}
