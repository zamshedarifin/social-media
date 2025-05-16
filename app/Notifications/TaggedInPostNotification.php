<?php
// app/Notifications/TaggedInPostNotification.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Post;
use App\Models\Vlogger;

class TaggedInPostNotification extends Notification
{
    use Queueable;

    protected $post;
    protected $tagger;

    public function __construct(Post $post, Vlogger $tagger)
    {
        $this->post = $post;
        $this->tagger = $tagger;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->tagger->name} tagged you in a post.",
            'post_id' => $this->post->id,
            'tagger_id' => $this->tagger->id,
        ];
    }
}
