<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;
use App\Models\UserAccount as UserAccount;

class Post extends Model {

    protected $table = "posts";
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function __construct() {}

    public function author(): BelongsTo {

        return $this->belongsTo(UserAccount::class, 'user_id', 'id');

    }

}
