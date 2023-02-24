<?php 

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;
use Illuminate\Database\Schema\Blueprint as Blueprint;

return new class extends Migration {

    public function up(): void {

        Schema::create('user_profiles', function(Blueprint $table) {

            $table->id('id');
            $table->date('date_of_birth');

        });

    }

    public function down(): void {

        Schema::dropIfExists('user_profiles');

    }

};
