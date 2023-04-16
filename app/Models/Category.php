<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function getRandomVideo(int $count, int $id)
    {
        return $this->videos()->inRandomOrder()->get()->take($count)->except($id);
    }
}
