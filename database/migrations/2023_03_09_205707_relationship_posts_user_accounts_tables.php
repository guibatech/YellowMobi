<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasColumn('user_accounts', 'id')) {

            Schema::table('posts', function(Blueprint $table) {

                $table->bigInteger('user_id')->unsigned();

            });

            if (Schema::hasColumn('posts', 'user_id')) {

                Schema::table('posts', function(Blueprint $table) {

                    $table->foreign('user_id')->references('id')->on('user_accounts');

                });

            }

        }

    }

    public function down(): void {

        if (Schema::hasColumn('posts', 'user_id')) {

            Schema::table('posts', function(Blueprint $table) {

                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');

            });

        }

    }

};
