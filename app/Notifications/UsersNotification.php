<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class UsersNotification extends Notification
{
    use Queueable;
    protected $name;
    protected $message;
    protected $imdb;
    protected $image;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$message,$imdb,$image)
    {
        $this->name = $name;
        $this->message = $message;
        $this->imdb =$imdb;
        $this->image =$imdb;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function  toDatabase($notifiable)
    {
        return [
            'message'=> $this->name.' '.$this->message,
            'imdb'=>$this->imdb,
            'image'=>$this->image
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
