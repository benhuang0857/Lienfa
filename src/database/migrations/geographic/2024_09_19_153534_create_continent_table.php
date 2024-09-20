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
        Schema::create('continent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('ch_name');
            $table->string('en_name')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('continent');
    }
};
