<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Comment;

class NewCommentNotification extends Notification
{
    use Queueable;

    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        // Define how notification is sent: mail, database, broadcast etc.
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $post = $this->comment->post;

        return [
            'post_id' => $post->id,
            'post_title' => isset($post->title) ? $post->title : '',
            'comment_id' => $this->comment->id,
            'comment' => $this->comment->comment,
            'commenter_id' => $this->comment->vlogger_id,
            'commenter_name' => isset($this->comment->vlogger->name) ? $this->comment->vlogger->name : 'Someone',
            'message' => (isset($this->comment->vlogger->name) ? $this->comment->vlogger->name : 'Someone') . ' commented on your post.',
        ];
    }

    // Optional: email notification if you want
    /*
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('New comment on your post!')
                    ->action('View Comment', url("/posts/{$this->comment->post_id}"))
                    ->line('Thank you for using our application!');
    }
    */
}
