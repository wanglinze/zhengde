<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('nav_id');
            $table->string('nav_name', 50)->default('')->comment('名称');
            $table->string('nav_alias', 50)->default('')->comment('别名');
            $table->string('nav_url', 255)->default('')->comment('url');
            $table->integer('nav_order')->default(0)->comment('排序');
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
        Schema::drop('navs');
    }
}
