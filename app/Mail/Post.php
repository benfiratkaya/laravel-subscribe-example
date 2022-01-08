<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Post extends Mailable
{
    use Queueable, SerializesModels;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("test")->markdown('emails/post');
    }
}
