<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
	public function goods(Request $request)
	{
		return view('hello.goods');
	}
}
