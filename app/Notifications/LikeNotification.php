<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;


class LikeNotification extends Notification
{
    use Queueable;

    public $auth;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($auth)
    {
      $this->auth = $auth;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['database', 'broadcast'];
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
          'user' => $notifiable,
          'auth' => $this->auth,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
