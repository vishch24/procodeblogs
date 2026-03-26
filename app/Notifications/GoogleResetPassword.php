<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GoogleResetPassword extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        // 🔥 Differentiate Google vs Normal User
        if (!empty($notifiable->google_id)) {
            $resetUrl = route('author.profile.google.reset.password', [$this->token]);
        } else {
            // Default Laravel reset URL
            $resetUrl = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->email,
            ], false));
        }

        return (new MailMessage)
            ->subject('Reset Your Password')
            ->line('Click the button below to reset your password.')
            ->action('Reset Password', $resetUrl)
            ->line('If you did not request a password reset, ignore this email.');
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
