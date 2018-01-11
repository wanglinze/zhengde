<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('art_id');
            $table->string('art_title', 100)->default('')->comment('标题');
            $table->string('art_tag', 100)->default('')->comment('关键词');
            $table->string('art_description', 255)->default('')->comment('描述');
            $table->string('art_thumb', 255)->default('')->comment('缩略图');
            $table->text('art_content')->comment('内容');
            $table->integer('art_time')->default(0)->comment('发布时间');
            $table->string('art_editor', 50)->default('')->comment('作者');
            $table->integer('art_view')->default(0)->comment('查看次数');
            $table->integer('cate_id')->default(0)->comment('分类ID');
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
        Schema::drop('articles');
    }
}
