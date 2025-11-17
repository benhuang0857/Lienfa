<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //定義GEO資訊彼此之間的關聯
    {
        Schema::create('continent_groupcountry_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('continent_country_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('groupcountry_country_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('country_groupprovince_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('country_province_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('country_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('groupprovince_province_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('groupprovince_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
        });

        Schema::create('province_city_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(-1);
            $table->integer('cid')->default(-1);
            $table->timestamps();

            $table->index(['pid', 'cid']);
            $table->unique(['pid', 'cid']);
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
