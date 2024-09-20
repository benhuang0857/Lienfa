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
        Schema::create('continent_groupcountry_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('continent_country_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('groupcountry_country_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('country_groupprovince_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('country_province_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('country_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('groupprovince_province_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('groupprovince_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });

        Schema::create('province_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('continent_groupcountry_relation');
        Schema::dropIfExists('continent_country_relation');
        Schema::dropIfExists('groupcountry_country_relation');
        Schema::dropIfExists('country_groupprovince_relation');
        Schema::dropIfExists('country_province_relation');
        Schema::dropIfExists('country_city_relation');
        Schema::dropIfExists('groupprovince_province_relation');
        Schema::dropIfExists('groupprovince_city_relation');
        Schema::dropIfExists('province_city_relation');
    }
};
