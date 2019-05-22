<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone',100)->comment('手机');
            $table->string('name',50)->comment('昵称')->nullable();
            $table->string('password',255)->comment('密码');
            $table->string('avatar',255)->comment('头像')->nullable();
            $table->string('remember_token',150)->comment('记住我')->nullable();
            $table->string('real_name',50)->comment('姓名')->nullable();
            $table->tinyInteger('sex')->default(0)->comment('性别')->nullable();
            $table->tinyInteger('level')->default(0)->comment('客户级别 0-普通客户，1-大客户，2-VIP，3-区代，4-省代');
            $table->string('mobile',150)->comment('手机')->nullable();
            $table->string('email',150)->comment('邮箱')->nullable();
            $table->string('province',20)->comment('省')->nullable();
            $table->string('city',20)->comment('市')->nullable();
            $table->string('district',20)->comment('区')->nullable();
            $table->string('street',20)->comment('街道')->nullable();
            $table->string('address',255)->comment('详细地址')->nullable();
            $table->uuid('uuid');
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
