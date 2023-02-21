<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UserAccount extends Model {

    protected $table = "user_accounts";
    protected $primaryKey = "id";
    public $timestamps = true;

}
