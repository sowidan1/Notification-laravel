<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNewNotification extends Notification
{
    use Queueable;

//    private $post;
//
//    public function __construct(Post $post)
//    {
//        $this->post = $post;
//    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'id'=> 1,
            'title'=> 'New Post',
            'body'=> 'New post has been created',
            'date'=> now(),
        ];
    }


//    public function toDatabase(object $notifiable): array
//    {
//        return [
//            'id'=> $this->post->id,
//            'title'=> $this->post->title,
//            'body'=> $this->post->body,
//            'date'=> $this->post->created_at,
//        ];
//    }


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
