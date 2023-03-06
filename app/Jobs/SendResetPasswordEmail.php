<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue as ShouldQueue;
use Illuminate\Bus\Queueable as Queueable;
use Illuminate\Foundation\Bus\Dispatchable as Dispatchable;
use \Throwable as Throwable;
use App\Mail\ResetPasswordMail as ResetPasswordMail;
use Illuminate\Support\Facades\Mail as Mail;

class SendResetPasswordEmail implements ShouldQueue {

    use Queueable, Dispatchable;

    private string $name;
    private string $username;
    private string $passwordResetToken;
    private string $email;

    public function __construct(string $name, string $username, string $passwordResetToken, string $email) {

        $this->name = $name;
        $this->username = $username;
        $this->passwordResetToken = $passwordResetToken;
        $this->email = $email;

    }

    public function handle(): void {

        Mail::to($this->email)->send(new ResetPasswordMail($this->name, $this->username, $this->passwordResetToken));

    }

    public function failed(Throwable $exception): void {}

}
