<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Database\Eloquent\Casts\Attribute as Attribute;

class UserAccount extends Model {

    protected $table = "user_accounts";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function password(): Attribute {

        return new Attribute(
            
            set: function($value) {

                return Hash::make($value);

            }

        );

    }

}
