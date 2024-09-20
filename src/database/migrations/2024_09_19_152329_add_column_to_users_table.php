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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('en_name')->nullable();
            $table->string('gender')->default('male');
            $table->string('company_code')->nullable();
            $table->string('mobile')->unique();
            $table->string('line')->nullable();
            $table->integer('role_id')->default(0); //0 mean default role
            $table->string('note')->nullable();
            $table->integer('sort')->default(0);
            $table->string('status')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'avatar', 
                'nick_name',
                'en_name',
                'gender', 
                'company_code',
                'mobile',
                'line',
                'role_id',
                'note',
                'sort',
                'status',
            ]);
        });
    }
};
