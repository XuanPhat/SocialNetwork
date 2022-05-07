<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'text',
        'image',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function PostLike()
    {
        return $this->hasMany(PostLike::class);
    }
    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }
}
