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
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('ch_name');
            $table->string('en_name')->nullable();
            $table->string('brief_name')->nullable();
            $table->string('capital')->nullable();
            $table->string('local_name')->nullable();
            $table->string('tel_area_number')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('currency')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(false);
            $table->boolean('link_province')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country');
    }
};
