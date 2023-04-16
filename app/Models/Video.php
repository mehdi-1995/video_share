<?php

namespace App\Models;

use App\Models\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category_id', 'slug', 'path', 'thumbnail', 'user_id', 'duration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDurationToHumanAttribute()
    {
        return gmdate('i:s', (int) $this->duration);
    }
    public function getCreatedAtToHumanAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }
    public function getThumbnailInHumanAttribute()
    {
        return "/storage/thumbnail/$this->thumbnail";
    }
    public function getPathInHumanAttribute()
    {
        return "/storage/$this->path";
    }
}
