<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->default('')->comment('标题');
            $table->string('tag', 100)->default('')->nullable()->comment('关键词');
            $table->string('description', 255)->default('')->nullable()->comment('描述');
            $table->string('image', 255)->default('')->nullable()->comment('图片');
            $table->text('content')->comment('内容');
            $table->string('author', 50)->default('')->comment('作者');
            $table->integer('view')->default(0)->comment('查看次数');
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
        Schema::dropIfExists('news');
    }
}
