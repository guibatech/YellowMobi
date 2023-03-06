<?php

namespace App\Traits;

trait TimeTrait {

    public function remainingTime(string $lastRequest, int $secondsToWait): ?string {

        $pastTimeInSeconds = strtotime("now") - strtotime($lastRequest);

        if ($pastTimeInSeconds < $secondsToWait) {

            $timeLeft = date("i:s", ($secondsToWait - $pastTimeInSeconds));
            return "Wait {$timeLeft} to request a new token.";

        }

        return null;

    }

}
