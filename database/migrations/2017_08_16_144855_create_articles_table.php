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
            $table->string('art_tag', 100)->default('')->nullable()->comment('关键词');
            $table->string('art_description', 255)->default('')->nullable()->comment('描述');
            $table->string('image', 255)->default('')->nullable()->comment('图片');
            $table->text('art_content')->comment('内容');
            $table->string('art_editor', 50)->default('')->nullable()->comment('作者');
            $table->integer('art_view')->default(0)->comment('查看次数');
            $table->integer('cate_id')->default(0)->comment('分类ID');
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
        Schema::drop('articles');
    }
}
