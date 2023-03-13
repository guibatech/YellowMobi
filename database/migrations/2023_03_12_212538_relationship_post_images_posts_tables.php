<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        if (Schema::hasTable('posts') && Schema::hasColumn('posts', 'id') && Schema::hasTable('post_images')) {

            Schema::table('post_images', function(Blueprint $table) {

                $table->bigInteger('post_id')->unsigned();

            });

            if (Schema::hasColumn('post_images', 'post_id')) {

                Schema::table('post_images', function(Blueprint $table) {

                    $table->foreign("post_id")->references('id')->on('posts');

                });

            }

        }

    }

    public function down(): void {

        if (Schema::hasTable("post_images") && Schema::hasColumn('post_images', 'post_id')) {

            Schema::table('post_images', function(Blueprint $table) {

                $table->dropForeign(['post_id']);
                $table->dropColumn('post_id');

            });

        }

    }

};
