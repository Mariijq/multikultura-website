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
        Schema::create('contacts', function (Blueprint $table) {
        $table->id();

        $table->json('email')->nullable();
        $table->json('address')->nullable();
        $table->json('phone')->nullable();

        $table->json('facebook')->nullable();
        $table->json('instagram')->nullable();
        $table->json('linkedin')->nullable();
        $table->json('youtube')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
