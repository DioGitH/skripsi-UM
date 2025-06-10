<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;


class KaryaBaruNotification extends Notification
{
    use Queueable;
    protected $karya;

    /**
     * Create a new notification instance.
     */
    public function __construct($karya)
    {
        $this->karya = $karya;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }
    /**
     * Get the mail representation of the notification.
     */
public function toDatabase($notifiable)
{
    return [
        'title' => $this->karya->title,
        'message' => 'Ada karya baru: ' . $this->karya->title,
        'karya_id' => $this->karya->id,
    ];
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
