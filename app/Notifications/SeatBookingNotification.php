<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SeatBookingNotification extends Notification
{
    use Queueable;
    public $userName;
    public $seats;
    public $hallName;
    /**
     * Create a new notification instance.
     */
    public function __construct($userName, $seats, $hallName)
    {
        $this->userName = $userName;
        $this->seats = $seats;
        $this->hallName = $hallName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Dear ' . $this->userName . ',')
            ->line('Your seats (' . implode(', ', $this->seats) . ') have been booked for the show in hall ' . $this->hallName . '.')
            ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
                'message' => 'Your seats (' . implode(', ', $this->seats) . ') have been booked for the show in hall ' . $this->hallName . '.',
                'link' => '#',
                ];
    }
}
