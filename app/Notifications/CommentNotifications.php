<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class CommentNotifications extends Notification implements ShouldBroadcast
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */

     public function toDatabase(object $notifiable): array
    {
        return [
            'user_id' => $this->user['id'],
            'name' => $this->user['name'],
            'post_id' => $this->user['post_id']
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => $this->user['name'] ." commented on your post."
        ]);

    }
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user['id'],
            'name' => $this->user['name'],
            'post_id' => $this->user['post_id']
        ];
    }
}
