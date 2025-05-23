<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vlogger extends Authenticatable
{
    use Notifiable;
    protected $table ="vloggers";
    protected $guarded =[];


    // Users this user is following
    public function followings()
    {
        return $this->belongsToMany(Vlogger::class, 'followers', 'follower_id', 'followed_id');
    }

    // Users who are following this user
    public function followers()
    {
        return $this->belongsToMany(Vlogger::class, 'followers', 'followed_id', 'follower_id');
    }

    // Check if a user is following another
    public function isFollowing($userId)
    {
        return $this->followings()->where('followed_id', $userId)->exists();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function taggedPosts()
    {
        return $this->belongsToMany(Post::class, 'tagged_users', 'user_id', 'post_id')
            ->withPivot('status');
    }

    public function giftsSent()
    {
        return $this->hasMany(Gift::class, 'vlogger_id'); // gifts sent by vlogger
    }

    public function giftPurchases()
    {
        return $this->hasMany(VloggerGiftPurchase::class);
    }
}
