<?php
namespace App\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Post;
use App\Models\Vlogger;

class PostLiked extends Notification
{
    public $post;
    public $liker;

    public function __construct(Post $post, Vlogger $liker)
    {
        $this->post = $post;
        $this->liker = $liker;
    }

    public function via($notifiable)
    {
        return ['database']; // or also 'mail' if needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->liker->name} liked your post.",
            'post_id' => $this->post->id,
            'liker_id' => $this->liker->id,
            'liker_name' => $this->liker->name,
        ];
    }
}
