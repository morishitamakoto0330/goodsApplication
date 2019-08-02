<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * データベースへのシーディングを行う
     *
     * @return void
     */
    public function run()
    {
	    $param = [
		    'name' => 'TSUKUMA',
	    ];
	    DB::table('shops')->insert($param);

	    $param = [
		    'name' => 'Dospari',
	    ];
	    DB::table('shops')->insert($param);

	    $param = [
		    'name' => 'sofmape',
	    ];
	    DB::table('shops')->insert($param);
    }
}
