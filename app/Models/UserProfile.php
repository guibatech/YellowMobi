<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;
use App\Models\UserAccount as UserAccount;

class UserProfile extends Model {

    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user(): BelongsTo {

        return $this->belongsTo(UserAccount::class, 'user_id', 'id');

    }

}
