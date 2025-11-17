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
        Schema::create('country', function (Blueprint $table) { //國家
            $table->id();
            $table->string('code')->unique();
            $table->string('ch_name')->nullable();
            $table->string('en_name')->nullable();
            $table->string('brief_name')->nullable();
            $table->string('local_name')->nullable();
            $table->integer('capital_id')->nullable(); //City ID
            $table->string('tel_area_number')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('currency')->nullable();
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
