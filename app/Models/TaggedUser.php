<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaggedUser extends Model
{
    use HasFactory;

    protected $table = 'tagged_users';

    protected $fillable = ['post_id', 'user_id', 'status'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(Vlogger::class, 'user_id');
    }
}
