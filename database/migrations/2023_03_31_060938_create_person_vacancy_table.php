<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('person_vacancy', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Person::class);
            $table->foreignIdFor(\App\Models\Vacancy::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_vacancy');
    }
};
