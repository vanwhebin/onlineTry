<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256)->comment("标题");;
            $table->string('slug', 256)->default("")->comment("slug");;
            $table->string('desc')->default('')->comment("文章摘要");
            $table->text('content')->comment("文章内容");
            $table->integer('user_id')->comment("创建者");
            $table->string('image')->comment("文章封面图");
            $table->unsignedInteger('category_id')->comment("分类");
            $table->unsignedInteger('views')->default(0)->comment("阅读量");
            $table->unsignedInteger('comments')->default(0)->comment("评论量");
            $table->unsignedSmallInteger('status')->default(1)->comment("状态：1-正常，0-隐藏");
            $table->unsignedSmallInteger('order')->default(0)->comment("排序");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
