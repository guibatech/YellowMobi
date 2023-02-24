<?php

use Illuminate\Support\Facades\Schema as Schema;
use Illuminate\Database\Migrations\Migration as Migration;

return new class extends Migration {

    public function up(): void {

        Schema::dropIfExists('personal_access_tokens');

    }

    public function down(): void {}

};
