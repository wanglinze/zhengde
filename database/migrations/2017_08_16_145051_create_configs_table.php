<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('conf_id');
            $table->string('conf_title', 50)->default('')->comment('标题');
            $table->string('conf_name', 50)->default('')->comment('名称');
            $table->text('conf_content')->comment('内容');
            $table->string('conf_tips', 255)->default('')->nullable()->comment('简介');
            $table->integer('conf_order')->default(0)->comment('排序');
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
        Schema::drop('configs');
    }
}
