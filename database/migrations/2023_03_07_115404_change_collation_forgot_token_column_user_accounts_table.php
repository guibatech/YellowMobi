<?php

use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;
use Illuminate\Support\Facades\Schema as Schema;

return new class extends Migration {

    public function up() {

        if (Schema::hasTable('user_accounts') && Schema::hasColumn('user_accounts', 'forgot_token')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('forgot_token')->nullable()->collation('utf8mb4_0900_as_cs')->change();

            });

        }

    }

    public function down() {

        if (Schema::hasTable('user_accounts') && Schema::hasColumn('user_accounts', 'forgot_token')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('forgot_token')->nullable()->collation(null)->change();

            });

        }

    }

};
