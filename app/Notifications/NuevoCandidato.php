<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante, $id_vacante, $prospecto)
    {
        $this->vacante = $vacante;
        $this->id_vacante = $id_vacante;
        $this->prospecto = $prospecto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Notificaciones en la DB.
     *
     */
    public function toDatabase($notifiable)
    {
        return [
            'vacante' => $this->vacante,
            'id_vacante' => $this->id_vacante,
            'prospecto' => $this->prospecto
        ];
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
                    ->line('Hay un nuevo candidato interesado en tu vacante.')
                    ->line('En la vacante: ' . $this->vacante)
                    ->action('Revisar panel', url('/'))
                    ->line('Gracias por utilizar PLAZ-DevJobs.');
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
