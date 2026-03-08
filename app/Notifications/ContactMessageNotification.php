<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Message;

class ContactMessageNotification extends Notification
{
    use Queueable;
    public $msg;
    public function __construct(Message $msg)
    {
        $this->msg = $msg;
    }
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouveau message de contact')
            ->greeting('📩 Nouveau message reçu !')
            ->line('Nom : ' . $this->msg->name)
            ->line('Email : ' . $this->msg->email)
            ->line('Message :')
            ->line($this->msg->content)
            ->action('Voir tous les messages', url('/admin/messages'));
    }
    public function toArray($notifiable)
    {
        return [
            'name' => $this->msg->name,
            'email' => $this->msg->email,
            'content' => $this->msg->content,
            'id' => $this->msg->id,
        ];
    }
}
