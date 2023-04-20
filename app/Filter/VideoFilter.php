<?php

namespace App\Filter;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class VideoFilter
{
    public function __construct(public Builder $builder)
    {
    }
    public function apply(array $filter)
    {
        $whiteList = ['sortBy', 'length', 'q'];
        foreach ($filter as $methodName => $value) {
            if (is_null($methodName) || !in_array($methodName, $whiteList)) continue;
            $this->$methodName($value);
        }
    }
    public function sortBy($value)
    {
        if ($value == 'like') {
            $this->builder->leftJoin('likes', function ($query) {
                $query->on('likes.likeable_id', '=', 'videos.id')
                    ->where('likes.likeable_type', '=', 'App\\Models\\Video')
                    ->where('likes.vote', 1);
            })->groupBy('videos.id')
                ->select('videos.*', DB::raw('count(likes.vote) as votes'))
                ->orderBy('votes', 'DESC');
        }
        if ($value == 'duration') {
            $this->builder->orderBy('duration', 'DESC');
        }
        if ($value == 'created_at') {
            $this->builder->orderBy('created_at', 'DESC');
        }
    }
    public function length($value)
    {
        if ($value == 1) {
            $this->builder->where('duration', '<', 60);
        }
        if ($value == 2) {
            $this->builder->whereBetween('duration', [60, 300]);
        }
        if ($value == 3) {
            $this->builder->where('duration', '>', 300);
        }
    }
    public function q($value)
    {
        $this->builder->where('title', 'like', "%$value%");
    }
}
