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
	    $binary_string = b'image';

	    $param = [
		    'image' => $binary_string,
		    'title' => 'goods1',
		    'desc' => 'sample goods 1',
		    'price' => 100,
	    ];
	    $goods = New Good;
	    $goods->fill($param)->save();

	    $param = [
		    'image' => $binary_string,
		    'title' => 'goods2',
		    'desc' => 'sample goods 2',
		    'price' => 200,
	    ];
	    $goods = New Good;
	    $goods->fill($param)->save();
    }
}
