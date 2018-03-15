<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', 50)->default()->comment('用户名');
            $table->string('user_pass', 255)->default()->comment('用户密码');
            $table->timestamps();
            $table->softDeletes();
        });
        \DB::table('admin_users')->insert(['user_name' => 'admin', 'user_pass' => \Hash::make('admin')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_users');
    }
}
