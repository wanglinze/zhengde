<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('cate_id');
            $table->string('cate_name', 50)->default()->comment('分类名称');
            $table->string('cate_title', 255)->default()->comment('分类说明');
            $table->string('cate_keywords', 255)->default()->comment('关键词');
            $table->string('cate_description', 255)->default()->comment('描述');
            $table->integer('cate_view')->default(0)->comment('查看次数');
            $table->tinyInteger('cate_order')->default(0)->comment('排序');
            $table->integer('cate_pid')->default(0)->comment('父id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
