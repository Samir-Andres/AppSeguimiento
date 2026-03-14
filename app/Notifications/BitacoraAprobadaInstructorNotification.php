<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BitacoraAprobadaInstructorNotification extends Notification
{
    use Queueable;
    public $aprendiz;
    public $instructor;
    public $ficha;

    /**
     * Create a new notification instance.
     */
    public function __construct( $aprendiz, $instructor, $ficha)
    {
        $this->aprendiz = $aprendiz;
        $this->instructor = $instructor;
        $this->ficha = $ficha;
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
                    ->subject('Bitácora Aprobada.')
                    ->view('Email.SendEmail.BitacoraAprobadaInstructor',
                    ['aprendiz' => $this->aprendiz, 'instructor' => $this->instructor, 'ficha' => $this->ficha]);
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
