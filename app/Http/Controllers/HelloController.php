<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
	public function create(Request $request)
	{
		return view('hello.create');
	}
}
