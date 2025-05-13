<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\PrivateChannel;

class TaggedInPostNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'You were tagged in a post.',
            'post_id' => $this->post->id,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'message' => 'You were tagged in a post.',
                'post_id' => $this->post->id,
            ]
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('vlogger.' . $this->post->user_id);
    }
}
