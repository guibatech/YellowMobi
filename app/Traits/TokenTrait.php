<?php

namespace App\Traits;

use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\ValidateTokenDigit as ValidateTokenDigit;

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

    public function tokenValidations(array $parameters): array {

        $rules = [];

        foreach ($parameters as $key => $value) {
            
            if (preg_match("/^(d_){1}[0-9]+$/", $key)) {
                
                $rules[$key] = [new ValidateTokenDigit(), 'bail', new DatabaseSizeExplosionProtection(1, null), 'bail',];
    
            }
            
        }

        return $rules;

    }

    public function rebuildToken(array $digits): string {

        $reconstructedToken = "";

        foreach($digits as $key => $value) {

            if (preg_match("/^(d_){1}[0-9]+$/", $key)) {

                $reconstructedToken .= $value;

            }

        }

        return $reconstructedToken;

    }

}
