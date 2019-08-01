<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsGoodsTable extends Migration
{
    /**
     * マイグレーションを実行する
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
		$table->bigInteger('shopId');
        });
    }

    /**
     * マイグレーションを巻き戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
		$table->dropColumn('shopId');
        });
    }
}
