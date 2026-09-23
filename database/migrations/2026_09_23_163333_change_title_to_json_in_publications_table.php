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
        Schema::table('publications', function (Blueprint $table) {
            $table->json('title');
            $table->date('date')->nullable();
            $table->json('short_description')->nullable();
            $table->json('detailed_description')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
