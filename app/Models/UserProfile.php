<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UserProfile extends Model {

    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
