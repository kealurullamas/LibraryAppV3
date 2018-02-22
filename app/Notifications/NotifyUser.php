<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\BooksRequest;
use App\User;
class NotifyUser extends Notification
{
    use Queueable;
    public $user;
    public $bookreq;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(BooksRequest $bookreq)
    {
        //
        $this->bookreq=$bookreq;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return ['bookreq'=>$this->bookreq->book];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data'=>[
                'bookreq'=>$this->bookreq->book
                ]
            ];
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
