<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use App\Filter\VideoFilter;
use Hekmatinasser\Verta\Verta;
use App\Models\Traits\Likeable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'title', 'description', 'category_id', 'slug', 'path', 'thumbnail', 'user_id', 'duration'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
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
    public function scopeFilter(Builder $builder, array $param)
    {
        (new VideoFilter($builder))->apply($param);
    }
}
