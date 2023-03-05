<?php

namespace App\Traits;

trait TokenTrait {

    public function generateToken(int $size): string {

        $allowedCharacters = [
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 
            'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 
            'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 
            'W', 'X', 'Y', 'Z', 
        ];

        $token = "";

        for($c = 1; $c <= $size; $c++) {
            
            $token .= $allowedCharacters[rand(0, (count($allowedCharacters) - 1))];

        }

        return $token;

    }

}
