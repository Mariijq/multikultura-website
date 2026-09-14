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
        Schema::create('messages', function (Blueprint $table) {
        $table->id();

        $table->json('first_name');
        $table->json('last_name');
        $table->json('email');
        $table->json('phone')->nullable();

        $table->json('field_of_study');
        $table->json('year_of_study');

        $table->json('address');
        $table->string('city');
        $table->string('country');
        $table->string('zipcode');

        $table->enum('period', [
            'fall_semester',
            'spring_semester',
            'summer',
        ]);

        $table->text('message')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
