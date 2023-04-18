<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory,Likeable;

    protected $fillable = ['body', 'user_id', 'video_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtToHumanAttribute($value)
    {
        return (new Verta($value))->formatDifference();
    }
}
