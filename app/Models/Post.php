<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ="posts";
    protected $guarded =[];


    public function vlogger()
    {
        return $this->belongsTo(Vlogger::class);
    }

    public function taggedUsers()
    {
        return $this->hasMany(TaggedUser::class);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
}
