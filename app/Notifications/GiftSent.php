<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Gift;
use App\Models\Vlogger;

class GiftSent extends Notification
{
    protected $gift;
    protected $sender;

    public function __construct(Gift $gift, Vlogger $sender)
    {
        $this->gift = $gift;
        $this->sender = $sender;
    }

    public function via($notifiable)
    {
        return ['database']; // Add 'mail' if email needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->sender->name} sent you a gift.",
            'post_id' => $this->gift->post_id,
            'gift_catalog_id' => $this->gift->gift_catalog_id,
            'quantity' => $this->gift->quantity,
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
        ];
    }
}
