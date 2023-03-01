<?php

use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up() {

        if (Schema::hasTable('user_accounts')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->datetime('activation_token_requested_at')->nullable();

            });

        }

    }

    public function down() {

        if (Schema::hasTable('user_accounts') && Schema::hasColumn('user_accounts', 'activation_token_requested_at')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->dropColumn('activation_token_requested_at');

            });

        }

    }

};
