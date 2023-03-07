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

    public function pastTime(string $lastRequest): ?DateTime {

        $pastTimeInSeconds = strtotime("now") - strtotime($lastRequest);

        dd($lastRequest, $pastTimeInSeconds, strtotime("now"), strtotime($lastRequest));

    }

}
