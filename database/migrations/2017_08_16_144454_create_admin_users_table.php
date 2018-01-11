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
        });
        \DB::table('admin_users')->insert(['user_name' => 'admin', 'user_pass' => 'eyJpdiI6Im9aS3djNXhvRjI2d2oxaDRiVThPYmc9PSIsInZhbHVlIjoiMVF4ZWk3RmdsUDVqS2NkTituejRTZz09IiwibWFjIjoiNTBhMzA1OTBhZTYxNzkxOWQzODgzZmRkZDg5NGQ5NmU0ODk4Nzg1ZTZhN2M0MDFkN2Q3NTJkZjc0Mzc3NmU2MCJ9']);
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
