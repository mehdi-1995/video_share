<?php

namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likedBy(User $user)
    {
        if ($this->isLikedBy($user)) {
            return $this->removeLikBy($user);
        }
        $this->likes()->create([
            'user_id' => $user->id,
            'vote' => 1
        ]);
    }
    public function dislikedBy(User $user)
    {
        if ($this->isDislikedBy($user)) {
            return $this->removeDisLikBy($user);
        }
        $this->likes()->create([
            'user_id' => $user->id,
            'vote' => -1
        ]);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()
            ->where('vote', 1)
            ->where('user_id', $user->id)
            ->exists();
    }
    public function isDislikedBy(User $user)
    {
        return $this->likes()
            ->where('vote', -1)
            ->where('user_id', $user->id)
            ->exists();
    }

    public function removeLikBy(User $user)
    {
        return $this->likes()
            ->where('vote', 1)
            ->where('user_id', $user->id)
            ->delete();
    }

    public function removeDisLikBy(User $user)
    {
        return $this->likes()
            ->where('vote', -1)
            ->where('user_id', $user->id)
            ->delete();
    }
    public function getLikeCountAttribute()
    {
        $CacheKeyName = $this->getCacheLike();
        return Cache::remember($CacheKeyName, 360, function () {
            return $this->likes()
                ->where('vote', 1)
                ->count();
        });
    }
    public function getDislikeCountAttribute()
    {
        $CacheKeyName = $this->getCacheDislike();
        return Cache::remember($CacheKeyName, 360, function () {
            return $this->likes()
                ->where('vote', -1)
                ->count();
        });
    }

    public function getCacheLike()
    {
        return 'like_count_for_' . class_basename($this) . '_' . $this->id;
    }
    public function getCacheDislike()
    {
        return 'dislike_count_for_' . class_basename($this) . '_' . $this->id;
    }
}
