<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->default('')->comment('课程名称');
            $table->string('tag', 100)->default('')->nullable()->comment('关键词');
            $table->string('description', 255)->default('')->nullable()->comment('描述');
            $table->text('content')->comment('课程内容');
            $table->string('image', 255)->default('')->nullable()->comment('图片');
            $table->integer('staff_id')->comment('授课人');
            $table->integer('view')->default(0)->comment('查看次数');
            $table->enum('type', array('temporary','normal'))->default('normal');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->char('class_time')->nullable()->comment('上课时间');
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
        Schema::dropIfExists('coureses');
    }
}
