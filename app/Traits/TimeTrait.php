<?php

namespace App\Traits;

use \DateTime as DateTime;

trait TimeTrait {

    public function remainingTime(?string $lastRequest, int $secondsToWait): ?string {

        if ($lastRequest == null) {

            return null;

        }

        $pastTimeInSeconds = strtotime("now") - strtotime($lastRequest);

        if ($pastTimeInSeconds < $secondsToWait) {
            
            return date("i:s", ($secondsToWait - $pastTimeInSeconds));

        }

        return null;
        
    }
    
    public function elapsedTime(?string $lastRequest, int $maximumSeconds): bool {
        
        if ($lastRequest == null) {
            
            return true;
            
        }
        
        $pastTimeInSeconds = strtotime("now") - strtotime($lastRequest);

        if ($pastTimeInSeconds > $maximumSeconds) {

            return false;

        }

        return true;

    }

}
