<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InstructorEmail extends Notification
{
    use Queueable;

    public $ficha;

    /**
     * Create a new notification instance.
     */
    public function __construct($ficha)
    {
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
                    ->subject('Asignación de seguimiento.')
                    ->view('Email.SendEmail.InstructorSeguimientos',
                        ['ficha' => $this->ficha, 'instructor' => $this->ficha->instructores,
                            'programa' => $this->ficha->programa_formacion]);
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
