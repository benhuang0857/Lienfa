<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) { //用戶
            $table->id();
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");

            // Additional
            $table->string("code")->nullable()->unique(); //工號
            $table->string("ch_name")->nullable();
            $table->string("en_name")->nullable();
            $table->string('nick_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->default('male');
            $table->integer('company_id')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->timestamp("mobile_verified_at")->nullable();
            $table->string('line')->nullable()->nullable();
            $table->timestamp("line_verified_at")->nullable();
            $table->integer('role_id')->default(0); //0 mean default role
            $table->string('note')->nullable();
            $table->integer('sort')->default(0);
            $table->string('status')->default('active');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create("password_reset_tokens", function (Blueprint $table) {
            $table->string("email")->primary();
            $table->string("token");
            $table->timestamp("created_at")->nullable();
        });

        Schema::create("sessions", function (Blueprint $table) {
            $table->string("id")->primary();
            $table
                ->foreignId("user_id")
                ->nullable()
                ->index();
            $table->string("ip_address", 45)->nullable();
            $table->text("user_agent")->nullable();
            $table->longText("payload");
            $table->integer("last_activity")->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("users");
        Schema::dropIfExists("password_reset_tokens");
        Schema::dropIfExists("sessions");
    }
};
