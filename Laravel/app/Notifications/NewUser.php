<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;

    public $name, $phone;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( string $name, string $phone )
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    //testuj :)


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //wiec i tu mozesz zrobic dd :)
        return (new MailMessage)
                    ->line('Hurra nowy user')
                    ->line('Jakiś kretyn o imieniu: '.$this->name.' i numerze telefonu: '.$this->phone.' Zarejestrował sie w mojej apce!')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
