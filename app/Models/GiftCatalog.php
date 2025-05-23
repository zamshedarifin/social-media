<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCatalog extends Model
{
    protected $table = 'gift_catalog';

    protected $fillable = ['name','icon', 'price'];

    public function gifts()
    {
        return $this->hasMany(Gift::class, 'gift_catalog_id');
    }

    public function purchases()
    {
        return $this->hasMany(VloggerGiftPurchase::class, 'gift_catalog_id');
    }
}
