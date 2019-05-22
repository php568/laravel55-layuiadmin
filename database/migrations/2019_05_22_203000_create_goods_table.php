<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bn',30)->comment('货号');
            $table->string('name',30)->comment('名称');
            $table->string('color',30)->default('')->comment('颜色');
            $table->string('size',30)->default('')->comment('尺寸');
            $table->string('style',30)->default('')->comment('款式');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['bn'], 'idx_bn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
