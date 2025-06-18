<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $viewName;
    public $bodyData;
    public $subjectText;

    public function __construct($viewName, $subjectText, $bodyData = [])
    {
        $this->viewName = $viewName;
        $this->bodyData = $bodyData;
        $this->subjectText = $subjectText;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->subjectText,
        );
    }

    public function content()
    {
        return new Content(
            view: $this->viewName,
            with: $this->bodyData
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
