<?php

use Illuminate\Database\Seeder;
use App\Good;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $path = '/sample.jpg';

	    $param = [
		    'imagePath' => $path,
		    'title' => 'goods1',
		    'desc' => 'sample goods 1',
		    'price' => 100,
	    ];
	    $goods = New Good;
	    $goods->fill($param)->save();

	    $param = [
		    'imagePath' => $path,
		    'title' => 'goods2',
		    'desc' => 'sample goods 2',
		    'price' => 200,
	    ];
	    $goods = New Good;
	    $goods->fill($param)->save();
    }
}
