<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodsTableSeeder extends Seeder
{
    /**
     * データベースへのシーディングを行う
     *
     * @return void
     */
    public function run()
    {
	    $param = [
		    'imagePath' => '/logo.png',
		    'title' => 'sample goods 2',
		    'desc' => 'This is sample goods.',
		    'price' => 100,
		    'shopId' => 1,
	    ];
	    DB::table('goods')->insert($param);

	    $param = [
		    'imagePath' => '/logo.png',
		    'title' => 'sample goods 2',
		    'desc' => 'This is sample goods.',
		    'price' => 200,
		    'shopId' => 2,
	    ];
	    DB::table('goods')->insert($param);
    }
}
