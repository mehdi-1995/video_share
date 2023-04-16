<?php

namespace App\Models;

use App\Models\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

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
    public function relatedVideos(int $count)
    {
        return $this->category->getRandomVideo($count, $this->id);
    }
    public function getDurationToHumanAttribute()
    {
        return gmdate('i:s', (int) $this->duration);
    }
    public function getCreatedAtToHumanAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }
    public function getVideoThumbnailInHumanAttribute()
    {
        return "/storage/thumbnail/$this->thumbnail";
    }
    public function getVideoPathInHumanAttribute()
    {
        return "/storage/$this->path";
    }
    public function delete()
    {
        dd("storage/app/private/thumbnail/$this->thumbnail");
        Storage::delete("storage/app/private/$this->path");
        Storage::delete("storage/app/private/thumbnail/$this->thumbnail");
        parent::delete();
    }
}
