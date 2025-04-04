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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_name');         // e.g. 'contact', 'career'
            $table->string('name')->nullable();  // for searching
            $table->string('email')->nullable(); // for searching
            $table->string('phone')->nullable(); // for searching
            $table->json('form_data');           // all fields saved here
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
