<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
	protected $table = 'goods';
	protected $guarded = array('id');

	public static $rules = array(
		'image' => 'required',
		'title' => 'required',
		'desc' => 'required',
		'price' => 'required'
	);

	public static getData() {
		return $this->id . ':' . $this->title
			. '(' . $this->desc . ')';
	}
}
