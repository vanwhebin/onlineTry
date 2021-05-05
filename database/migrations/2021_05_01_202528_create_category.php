<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256)->comment("名称");
            $table->unsignedInteger('parent_id')->comment("上级分类")->default(0);
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
        Schema::dropIfExists('category');
    }
}
