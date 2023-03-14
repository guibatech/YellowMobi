<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('user_profiles')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->string('photo_path')->nullable();
                $table->text('bio')->nullable();
                $table->boolean('premium')->default('0');

            });

        }

    }

    public function down(): void {

        if (Schema::hasColumn('user_profiles', 'photo_path')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->dropColumn('photo_path');

            });

        }

        if (Schema::hasColumn('user_profiles', 'bio')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->dropColumn('bio');

            });

        }

        if (Schema::hasColumn('user_profiles', 'premium')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->dropColumn('premium');

            });

        }

    }

};
