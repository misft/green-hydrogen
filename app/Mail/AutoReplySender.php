<?php

namespace App\Mail;

use App\Models\AutoReplyNewsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutoReplySender extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = AutoReplyNewsletter::first();
        $this->title = $data->title;
        $this->content = $data->content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->title)
        ->view('admin.newsletter.emails.autoreply')
        ->with([
            'title' => $this->title,
            'content' => $this->content
        ]);
        return $email;
    }
}
