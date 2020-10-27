<?php

namespace App\Notifications;

use App\User;
use App\Careerdirectparam;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

// Instance de la classe qui traite les notifications
class CareerdirectparamNotification extends Notification
{
    use Queueable;

    protected $user;// utilisateur connecté qui vient de poster - récupérer pour l'afficher sur la barre de navigation
    protected $careerdirectparam;// sur kel topic on vient de commenter

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Careerdirectparam $careerdirectparam, User $user)
    {
        $this->careerdirectparam = $careerdirectparam;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['database'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // retourner les variables dont on aura besoin - servira à afficher la notification
        return [
            'careerdirectparamId' => $this->careerdirectparam->user_id,
            'careerdirectparamNom' => $this->careerdirectparam->nom,
            'careerdirectparamPrenom' => $this->careerdirectparam->prenom,
            'careerdirectparamAdresse' => $this->careerdirectparam->adresse,
            'userNom' => $this->user->nom,
            'userPrenom' => $this->user->prenom,
        ];
    }
}
