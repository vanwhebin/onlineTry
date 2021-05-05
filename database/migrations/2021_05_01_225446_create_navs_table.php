<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->comment('导航名称');
            $table->unsignedSmallInteger('type')->default(1)->comment('导航类型:1-头部，2：尾部');
            $table->unsignedSmallInteger('parent_id')->default(0)->comment('上级导航');
            $table->unsignedSmallInteger('status')->default(1)->comment('状态：1-显示，0-隐藏');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('navs');
    }
}
