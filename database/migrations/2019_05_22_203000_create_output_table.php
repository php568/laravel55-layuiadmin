<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no',20)->comment('出货单号');
            $table->timestamp('order_at')->comment('出货时间');
            $table->string('name',30)->comment('名称');
            $table->string('bn',30)->comment('货号');
            $table->string('quantity',30)->comment('数量');
            $table->string('price',30)->comment('价格');
            $table->string('color',30)->default('')->comment('颜色');
            $table->string('size',30)->default('')->comment('尺寸');
            $table->string('style',30)->default('')->comment('款式');
            $table->string('buyer',20)->default('')->comment('购买人');
            $table->string('address',255)->default('')->comment('地址');
            $table->string('phone',20)->default('')->comment('联系电话');
            $table->string('logi_no',30)->default('')->comment('快递单号');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['no'], 'idx_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('output');
    }
}
