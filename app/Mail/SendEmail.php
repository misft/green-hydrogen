<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $files = null)
    {
        $this->details = $details;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->details['subject'])->view('admin.newsletter.emails.view');
        // dd($this->attachments);
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                // dd($file->getRealPath(), $file->getClientOriginalName(), $file->getClientMimeType());
                // $separated = explode(".",$file);
                // $name = end($separated);
                // $email->attach(Storage::path($file), ['as' => 'attachment.'.$name,'mime' => Storage::getMimeType($file)]);

                $separated = explode(".",$file->getClientOriginalName());
                $name = end($separated);
                $email->attach($file->getRealPath(), ['as' => 'Attachment.'.$name, 'mime' => $file->getClientMimeType()]);
            }
        }
        return $email;
    }
}
