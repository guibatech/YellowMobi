<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('user_activities')) {

            if (Schema::hasColumn('user_activities', 'activity')) {

                Schema::table('user_activities', function(Blueprint $table) {

                    $table->text('activity')->change();

                });

            }

            if (Schema::hasColumn('user_activities', 'details')) {

                Schema::table('user_activities', function(Blueprint $table) {

                    $table->text('details')->nullable()->change();

                });

            }

        }

    }

    public function down(): void {

        if (Schema::hasTable('user_activities')) {

            if (Schema::hasColumn('user_activities', 'activity')) {

                Schema::table('user_activities', function(Blueprint $table) {

                    $table->string('activity')->change();

                });

            }

            if (Schema::hasColumn('user_activities', 'details')) {

                Schema::table('user_activities', function(Blueprint $table) {

                    $table->string('details')->nullable()->change();

                });

            }

        }

    }

};
