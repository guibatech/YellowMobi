<?php

namespace App\Mail;

use Illuminate\Mail\Mailable as Mailable;
use Illuminate\Mail\Mailables\Envelope as Envelope;
use Illuminate\Mail\Mailables\Content as Content;

class ResetPasswordMail extends Mailable {

    private string $name;
    private string $username;
    private string $passwordResetToken;

    public function __construct(string $name, string $username, string $passwordResetToken) {

        $this->name = $name;
        $this->username = $username;
        $this->passwordResetToken = $passwordResetToken;

    }

    public function envelope(): Envelope {

        return new Envelope(
            subject: "Shall we reset your password?",
        );

    }

    public function content(): Content {

        return new Content(
            view: 'Mail.resetpassword',
            with: [
                'name' => $this->name,
                'username' => $this->username,
                'passwordResetToken' => $this->passwordResetToken,
            ],
        );

    }

    public function attachments(): array {

        return [

        ];

    }

}
