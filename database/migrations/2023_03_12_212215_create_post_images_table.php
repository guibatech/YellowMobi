<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        Schema::create('post_images', function(Blueprint $table) {

            $table->id("id");
            $table->string("path");
            $table->timestamps();

        });

    }

    public function down(): void {

        Schema::dropIfExists('post_images');

    }

};
