<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Database\Eloquent\Casts\Attribute as Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable {

    protected $table = "user_accounts";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function __construct() {

        $this->attributes['activation_token'] = $this->generateActivationToken(11111, 99999);

    }

    private function generateActivationToken(int $minimum, int $maximum): int {

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

    public function password(): Attribute {

        return new Attribute(
            
            set: function($value) {

                return Hash::make($value);

            }

        );

    }

}
