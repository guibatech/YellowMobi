<?php

namespace App\Traits;

trait TimeTrait {

    public function remainingTime(string $lastRequest, int $secondsToWait): ?string {

        $pastTimeInSeconds = strtotime("now") - strtotime($lastRequest);

        if ($pastTimeInSeconds < $secondsToWait) {
            
            return date("i:s", ($secondsToWait - $pastTimeInSeconds));

        }

        return null;

    }

}
