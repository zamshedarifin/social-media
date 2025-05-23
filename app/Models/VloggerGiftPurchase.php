<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VloggerGiftPurchase extends Model
{
    protected $fillable = ['vlogger_id', 'gift_catalog_id', 'total_quantity', 'total_amount'];

    public function vlogger()
    {
        return $this->belongsTo(Vlogger::class);
    }

    public function giftCatalog()
    {
        return $this->belongsTo(GiftCatalog::class);
    }
}
