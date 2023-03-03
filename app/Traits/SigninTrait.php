<?php

namespace App\Traits;

use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Traits\GetCredentialTypeTrait as GetCredentialTypeTrait;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\UserActivity as UserActivity;
use App\Models\UserAccount as UserAccount;
use App\Traits\ClearUsernameTrait as ClearUsernameTrait;

trait SigninTrait {

    use ClearUsernameTrait, GetCredentialTypeTrait;

    public function signinAttempt(string $credential, string $password, string $successRoute, string $errorMessage, string $logTitle, string $logDescription): RedirectResponse { 

        $credentialType = $this->getCredentialType($credential);
        
        if ($credentialType == "username") {
            
            $credential = $this->clearUsername($credential);
            
        }

        if (!Auth::attempt([
            $credentialType => $credential,
            'password' => $password,
        ])) {

            $userTarget = UserAccount::where($credentialType, "=", $credential)->first();
            UserActivity::quickActivity("Invalid account access attempt.", "Invalid account access attempt.", $userTarget->id);

            return redirect()->back()->withInput()->withErrors([
                'system' => $errorMessage,
            ]);

        }

        UserActivity::quickActivity($logTitle, $logDescription, Auth::user()->id);

        return redirect()->route($successRoute);

    }

}
