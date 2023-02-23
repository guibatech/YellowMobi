<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue as ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable as Dispatchable;
use Illuminate\Bus\Queueable as Queueable;
use Illuminate\Support\Facades\Mail as Mail;
use App\Mail\SignupMail as SignupMail;
use App\Models\UserActivity as UserActivity;

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
        
        UserActivity::quickActivity("Sending account activation token.", "The token {$this->activationToken} was sent to the email {$this->email}.", $this->userId);

    }

}
