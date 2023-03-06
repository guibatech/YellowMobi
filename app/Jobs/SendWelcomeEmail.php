<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue as ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable as Dispatchable;
use Illuminate\Bus\Queueable as Queueable;
use Illuminate\Support\Facades\Mail as Mail;
use App\Mail\SignupMail as SignupMail;
use App\Models\UserActivity as UserActivity;
use \Throwable as Throwable;

class SendWelcomeEmail implements ShouldQueue {

    use Dispatchable, Queueable;

    private string $signinRouteLink;

    private string $email;
    private string $name;
    private string $username;
    private string $activationToken;
    private int $userId;

    public function __construct(string $email, string $name, string $username, string $activationToken, int $userId) {

        $this->email = $email;
        $this->name = $name;
        $this->username = $username;
        $this->activationToken = $activationToken;
        $this->userId = $userId;

    }

    public function handle(): void {

        Mail::to($this->email)->send(new SignupMail($this->name, $this->username, $this->activationToken));
        
        UserActivity::quickActivity("Account activation token {$this->activationToken} has been successfully sent to {$this->email} email.", "Account activation token {$this->activationToken} has been successfully sent to {$this->email} email.", $this->userId);

    }

    public function failed(Throwable $exception): void {

        UserActivity::quickActivity("Sending account activation token {$this->activationToken} to {$this->email} email failed.", "Sending account activation token {$this->activationToken} to {$this->email} email failed.", $this->userId);

    }

}
