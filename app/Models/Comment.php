<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ="comments";
    protected $guarded =[];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function vlogger()
    {
        return $this->belongsTo(Vlogger::class,'vlogger_id');
    }
}
