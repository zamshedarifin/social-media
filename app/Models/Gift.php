<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = ['post_id', 'vlogger_id', 'gift_catalog_id', 'quantity'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function vlogger()
    {
        return $this->belongsTo(Vlogger::class);
    }

    public function giftCatalog()
    {
        return $this->belongsTo(GiftCatalog::class, 'gift_catalog_id');
    }
}
