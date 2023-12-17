<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Boutique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationRejected extends Notification
{
    use Queueable;

    private $boutique;

    /**
     * Create a new notification instance.
     */
    public function __construct($boutique)
    {
        $this->boutique = $boutique;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Reservation Rejected')
        ->line('We regret to inform you that your reservation has been rejected.')
        ->line('Please contact support for further details.'); // Adjust message according to your application's needs
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
