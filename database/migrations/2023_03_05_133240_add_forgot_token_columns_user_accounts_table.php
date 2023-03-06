<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up() {

        if (Schema::hasTable('user_accounts')) {

            Schema::table('user_accounts', function(Blueprint $table) {

                $table->string('forgot_token')->nullable();
                $table->datetime('forgot_token_requested_at')->nullable();

            });

        }

    }

    public function down() {

        if (Schema::hasTable('user_accounts')) {

            if (Schema::hasColumn('user_accounts', 'forgot_token')) {

                Schema::table('user_accounts', function(Blueprint $table) {
    
                    $table->dropColumn('forgot_token');
    
                });
    
            }

            if (Schema::hasColumn('user_accounts', 'forgot_token_requested_at')) {

                Schema::table('user_accounts', function(Blueprint $table) {
    
                    $table->dropColumn('forgot_token_requested_at');
    
                });
    
            }

        }

    }

};
