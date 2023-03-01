<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\UserAccount as UserAccount;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;

class UserActivity extends Model {

    protected $table = "user_activities";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function __construct() {}

    public static function quickActivity(string $activity, ?string $details, int $userId): void {

        $userActivity = new UserActivity();
        $userActivity->activity = $activity;
        $userActivity->details = $details;
        $userActivity->user_id = $userId;
        $userActivity->save();

    }

    public function user(): BelongsTo {

        return $this->belongsTo(UserAccount::class, 'user_id', 'id');

    }

}
