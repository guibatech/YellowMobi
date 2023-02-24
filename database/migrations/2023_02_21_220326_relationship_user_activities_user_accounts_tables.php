<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasColumn('user_accounts', 'id') && Schema::hasTable('user_activities')) {

            Schema::table('user_activities', function(Blueprint $table) {

                $table->bigInteger('user_id')->unsigned();

            });

            if (Schema::hasColumn('user_activities', 'user_id')) {

                Schema::table('user_activities', function(Blueprint $table) {

                    $table->foreign('user_id')->references('id')->on('user_accounts');

                });

            }

        }

    }

    public function down(): void {

        if (Schema::hasColumn('user_activities', 'user_id')) {

            Schema::table('user_activities', function(Blueprint $table) {

                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');

            });

        }

    }

};
