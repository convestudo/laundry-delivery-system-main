<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DriverRegistered extends Notification
{
    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('You are now registered as a Delivery Driver')
                    ->greeting('Hello ' . $notifiable->name . '!')
                    ->line('Your account has been successfully created.')
                    ->line('Email: ' . $this->email)
                    ->line('Password: ' . $this->password)
                    ->line('Please login to the system and update your profile.')
                    ->action('Login Now', url('/login'))
                    ->line('Thank you for joining our team!');
    }
}
