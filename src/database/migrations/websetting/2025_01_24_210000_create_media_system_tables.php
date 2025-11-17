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
        // 媒體庫主表
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');              // 原始檔名
            $table->string('file_path');              // 儲存路徑
            $table->string('file_type')->nullable();  // image/video/document
            $table->string('mime_type')->nullable();  // image/png, image/jpeg
            $table->integer('file_size')->nullable(); // bytes
            $table->integer('width')->nullable();     // 圖片寬度
            $table->integer('height')->nullable();    // 圖片高度
            $table->string('alt_text')->nullable();   // 替代文字（SEO用）
            $table->text('description')->nullable();  // 描述
            $table->timestamps();

            // 索引
            $table->index('file_type');
            $table->index('created_at');
        });

        // 多態關聯表 - 可關聯任何模型
        Schema::create('mediable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->morphs('mediable');               // mediable_type + mediable_id (已自動建立索引)
            $table->string('collection')->default('default'); // 圖片分類: main, gallery, thumbnail, icon
            $table->integer('sort')->default(0);      // 排序
            $table->timestamps();

            // 索引
            // morphs() 已自動建立 mediable_type 和 mediable_id 的索引，不需要重複建立
            $table->index('collection');

            // 唯一約束：同一實體的同一集合中，同一媒體只能出現一次
            $table->unique(['media_id', 'mediable_type', 'mediable_id', 'collection'], 'mediable_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediable');
        Schema::dropIfExists('media');
    }
};
