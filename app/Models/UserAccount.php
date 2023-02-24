<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Database\Eloquent\Casts\Attribute as Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserProfile as UserProfile;
use Illuminate\Database\Eloquent\Relations\HasOne as HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany as HasMany;
use App\Models\UserActivity as UserActivity;

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

    public function profile(): HasOne {

        return $this->hasOne(UserProfile::class, 'user_id', 'id');

    }

    public function activities(): HasMany {

        return $this->hasMany(UserActivity::class, 'user_id', 'id');

    }

}
