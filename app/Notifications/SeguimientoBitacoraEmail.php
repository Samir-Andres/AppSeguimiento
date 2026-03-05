<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SeguimientoBitacoraEmail extends Notification
{
    use Queueable;

    public $aprendiz;
    public  $bitacora;
    /**
     * Create a new notification instance.
     */
    public function __construct($aprendiz, $bitacora)
    {

        $this->aprendiz = $aprendiz;
        $this->bitacora = $bitacora;
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
                    ->subject('Nueva bitácora')
                    ->view('Email.SendEmail.SeguimientoBitacoraEmail',
                    ['aprendiz' => $this->aprendiz,
                      'bitacora' => $this->bitacora,
                      'instructor' => $notifiable]);
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
