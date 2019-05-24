<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dict', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group',20)->comment('组别');
            $table->string('code', 64)->comment('code码');
            $table->string('value',64)->comment('字典值');
            $table->tinyInteger('sort')->comment('排序');
            $table->string('desc')->comment('描述');
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
        Schema::dropIfExists('dict');
    }
}
