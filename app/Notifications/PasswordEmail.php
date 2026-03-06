<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordEmail extends Notification
{
    use Queueable;
    public $Correo_Institucional;
    public $Nombres;
    public $Apellidos;
    public $password;

    /**
     * Create a new notification instance.
     */
    public function __construct($Correo_Institucional, $Nombres, $Apellidos, $password)
    {
        $this->Correo_Institucional = $Correo_Institucional;
        $this->Nombres = $Nombres;
        $this->Apellidos = $Apellidos;
        $this->password = $password;
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
                    ->subject('Credenciales para ingresar al sistema SGEP')
                   ->view('Email.SendEmail.InstructorEmailPassword',
                   ['Correo_Institucional' => $this->Correo_Institucional,
                    'Nombres' => $this->Nombres,
                    'Apellidos'=> $this->Apellidos,
                    'Password' => $this->password]
                   );
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
