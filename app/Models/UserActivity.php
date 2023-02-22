<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UserActivity extends Model {

    protected $table = "user_activities";
    protected $primaryKey = "id";
    public $timestamps = true;

    public static function quickActivity(string $activity, ?string $details, int $userId): void {

        $userActivity = new UserActivity();
        $userActivity->activity = $activity;
        $userActivity->details = $details;
        $userActivity->user_id = $userId;
        $userActivity->save();

    }

}
