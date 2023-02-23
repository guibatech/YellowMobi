<?php

namespace App\Mail;

use Illuminate\Mail\Mailable as Mailable;
use Illuminate\Mail\Mailables\Envelope as Envelope;
use Illuminate\Mail\Mailables\Content as Content;

class SignupMail extends Mailable {

    private string $emailSubject;

    private string $name;
    private string $username;
    private string $activationToken;

    public function __construct(string $name, string $username, string $activationToken) {

        $this->emailSubject = config('app.name');

        $this->name = $name;
        $this->username = $username;
        $this->activationToken = $activationToken;

    }

    public function envelope(): Envelope {

        return new Envelope(
            subject: "Welcome to {$this->emailSubject}!",
        );

    }

    public function content(): Content {

        return new Content(
            view: 'Mail.signup',
            with: [
                'name' => $this->name,
                'username' => $this->username,
                'activationToken' => $this->activationToken,
            ]
        );

    }

    public function attachments(): array {

        return [];

    }

}
