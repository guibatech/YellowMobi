<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up() {

        if (Schema::hasTable('user_profiles') && !Schema::hasColumn('user_profiles', 'name')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->string('name');

            });

        }

    }

    public function down() {

        if (Schema::hasColumn('user_profiles', 'name')) {

            Schema::table('user_profiles', function(Blueprint $table) {

                $table->dropColumn('name');

            });

        }

    }

};
