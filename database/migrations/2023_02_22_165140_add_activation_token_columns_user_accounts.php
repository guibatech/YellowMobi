<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('user_accounts')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('activation_token')->nullable();
                $table->datetime('activation_at')->nullable();

            });

        }

    }

    public function down(): void {

        if (Schema::hasColumn('user_accounts', 'activation_token')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->dropColumn('activation_token');

            });

        }

        if (Schema::hasColumn('user_accounts', 'activation_at')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->dropColumn('activation_at');

            });

        }

    }

};
