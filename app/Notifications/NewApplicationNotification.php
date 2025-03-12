<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewApplicationNotification extends Notification
{
    use Queueable;

    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail', 'broadcast', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nova Candidatura Recebida')
            ->line('Você recebeu uma nova candidatura para a oferta: ' . $this->application->jobOffer->title)
            ->line('Candidato: ' . $this->application->user->profile->full_name)
            ->action('Ver Candidaturas', url('/applications'))
            ->line('Obrigado por usar a Empregabilidade Amar Terra Verde!');
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => "Nova candidatura recebida para {$this->application->jobOffer->title} por {$this->application->user->profile->full_name}",
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'application_id' => $this->application->id,
            'job_offer_title' => $this->application->jobOffer->title,
            'candidate_name' => $this->application->user->profile->full_name,
        ];
    }
}
