<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public JobApplication $application)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Job Application — ' . $this->application->job->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application-received',
        );
    }

    public function attachments(): array
    {
        if ($this->application->cv_path) {
            return [
                Attachment::fromStorage($this->application->cv_path)
                    ->as('CV-' . str_replace(' ', '-', $this->application->name) . '.pdf'),
            ];
        }

        return [];
    }
}
