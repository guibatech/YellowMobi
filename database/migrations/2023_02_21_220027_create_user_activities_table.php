<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up() {

        Schema::create('user_activities', function(Blueprint $table) {

            $table->id('id');
            $table->timestamps();
            $table->string('activity');
            $table->string('details')->nullable();

        });

    }

    public function down() {

        Schema::dropIfExists('user_activities');

    }

};
