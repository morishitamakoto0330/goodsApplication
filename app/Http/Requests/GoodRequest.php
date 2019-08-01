<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
{
    /**
     * ユーザがリクエストを行うことを許可されているか判定する
     *
     * @return bool
     */
    public function authorize()
    {
	    if(preg_match('/good/', $this->path())) {
		    return true;
	    } else {
		    return false;
	    }
    }

    /**
     * リクエストへのバリデーションルールを定義する
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'image' => 'required|file|image|mimes:jpeg,png',
		    'title' => 'required|string',
		    'desc'  => 'required|string',
		    'price' => 'required|integer',
	    ];
    }

    /**
     * エラーメッセージを定義する
     *
     * @return array
     */
    public function messages()
    {
	    return [
		    'image.required' => '商品画像を選んで下さい',
		    'image.image' => '画像ファイルを選んで下さい',
		    'image.mimes' => '商品画像の拡張子はjpegもしくはpngにして下さい',
		    'title.required' => '商品名を記入してください',
		    'desc.required'  => '商品説明を記入して下さい',
		    'price.required' => '商品価格を設定して下さい',
		    'price.integer' => '商品価格は整数で設定して下さい',
	    ];
    }
}
