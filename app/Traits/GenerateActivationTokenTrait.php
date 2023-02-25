<?php

namespace App\Traits;

trait GenerateActivationTokenTrait {

    public function generateActivationToken(int $minimum, int $maximum): int {

        $newToken = 0;
        $secureToken = false;
        $tries = 0;
        
        while (!$secureToken && $tries < 50) {

            $tries += 1;    
            $newToken = str_split(rand($minimum, $maximum), 1);

            foreach($newToken as $position => $digit) {
                
                if ($position == 0) {
                    continue;
                }

                if ($digit == $newToken[$position - 1]) {
                    $secureToken = false;
                } else {
                    $secureToken = true;
                    break;
                }

            }

        }

        return (int) implode("", $newToken);

    }

}
