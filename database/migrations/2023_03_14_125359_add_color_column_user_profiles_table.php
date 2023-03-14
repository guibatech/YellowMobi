<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('user_profiles')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->string('color');

            });

        }

    }

    public function down(): void {

        if (Schema::hasColumn("user_profiles", "color")) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->dropColumn("color");

            });

        }

    }

};
