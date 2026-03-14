<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BitacoraRechazadaNotification extends Notification
{
    use Queueable;

    public $aprendiz;
    public $instructor;


    /**
     * Create a new notification instance.
     */
    public function __construct( $aprendiz, $instructor)
    {
        $this->aprendiz = $aprendiz;
        $this->instructor = $instructor;
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
                  ->subject('Bitácora Rechazada.')
                  ->view('Email.SendEmail.BitacoraRechazada',
                ['aprendiz' => $this->aprendiz, 'instructor' => $this->instructor]);
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
