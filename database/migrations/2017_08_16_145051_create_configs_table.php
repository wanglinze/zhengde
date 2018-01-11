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
            $table->string('conf_tips', 255)->default('')->comment('简介');
            $table->string('field_type', 50)->default('')->comment('类型');
            $table->string('field_value', 255)->default('')->comment('类型值');
            $table->integer('conf_order')->default(0)->comment('排序');
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
        Schema::drop('configs');
    }
}
