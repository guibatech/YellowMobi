<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up() {

        Schema::create('posts', function(Blueprint $table) {

            $table->id('id');
            $table->timestamps();
            $table->text('content');

        });

    }

    public function down() {

        Schema::dropIfExists('posts');

    }

};
