<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNotifications extends Notification implements ShouldBroadcast
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
    
     public function toDatabase($notifiable)
     {
        return [
            'user_id' => $this->user['user_id'],
            'message' => $this->user['message']
        ];
     }

     public function toBroadcast($notifiable)
     {
        return new BroadcastMessage([
            'message' => 'Someone sent you a message'
        ]);
     }

    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user['user_id'],
            'message' => $this->user['message']
        ];
    }
}
