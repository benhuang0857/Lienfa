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
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0);
            $table->integer('weight')->default(0);
            $table->string('name');
            $table->string('tenant_id');
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('category');
            $table->string('module')->nullable();
            $table->string('menu_type')->nullable();
            $table->string('path');
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->integer('sort_code')->default(0);
            $table->string('component')->nullable();
            $table->string('delete_flag')->default("NOT_DELETE");

            //meta
            $table->string('active_menu')->nullable();
            $table->string('permission')->nullable();
            $table->boolean('hidden')->default(false);
            $table->boolean('always_show')->default(false);
            $table->boolean('no_cache')->default(false);
            $table->boolean('breadcrumb')->default(false);
            $table->boolean('affix')->default(false);
            $table->boolean('no_tags_view')->default(false);
            $table->boolean('can_to')->default(false);
            $table->string('type')->default("menu");
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
