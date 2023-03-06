<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue as ShouldQueue;
use Illuminate\Bus\Queueable as Queueable;
use Illuminate\Foundation\Bus\Dispatchable as Dispatchable;
use \Throwable as Throwable;
use App\Mail\ResetPasswordMail as ResetPasswordMail;
use Illuminate\Support\Facades\Mail as Mail;
use App\Models\UserActivity as UserActivity;

class SendResetPasswordEmail implements ShouldQueue {

    use Queueable, Dispatchable;

    private string $name;
    private string $username;
    private string $passwordResetToken;
    private string $email;
    private int $userId;

    public function __construct(string $name, string $username, string $passwordResetToken, string $email, int $userId) {

        $this->name = $name;
        $this->username = $username;
        $this->passwordResetToken = $passwordResetToken;
        $this->email = $email;
        $this->userId = $userId;

    }

    public function handle(): void {

        Mail::to($this->email)->send(new ResetPasswordMail($this->name, $this->username, $this->passwordResetToken));

        UserActivity::quickActivity("Password reset token {$this->passwordResetToken} has been successfully sent to {$this->email} email.", "Password reset token {$this->passwordResetToken} has been successfully sent to {$this->email} email.", $this->userId);

    }

    public function failed(Throwable $exception): void {

        UserActivity::quickActivity("Sending password reset token {$this->passwordResetToken} to {$this->email} email failed.", "Sending password reset token {$this->passwordResetToken} to {$this->email} email failed.", $this->userId);

    }

}
