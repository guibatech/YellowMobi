<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('user_accounts') && Schema::hasColumn('user_accounts', 'activation_token')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('activation_token')->nullable()->collation('utf8mb4_0900_as_cs')->change();

            });

        }

    }

    public function down(): void {

        if (Schema::hasTable('user_accounts') && Schema::hasColumn('user_accounts', 'activation_token')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('activation_token')->nullable()->collation(null)->change();

            });

        }

    }

};
