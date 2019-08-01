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
		    'image' => 'required|image|mimes:jpeg,png',
		    'title' => 'required|string|strlen_max100',
		    'desc'  => 'required|string|strlen_max500',
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
		    'image.required'     => '※商品画像を選んで下さい',
		    'image.image'        => '※画像ファイルを選んで下さい',
		    'image.mimes'        => '※商品画像の拡張子はjpegもしくはpngにして下さい',
		    'title.required'     => '※商品タイトルを記入してください',
		    'title.strlen_max100' => '※商品タイトルは100文字以内にして下さい',
		    'desc.required'      => '※商品説明を記入して下さい',
		    'desc.strlen_max500'  => '※商品説明は500文字以内にして下さい',
		    'price.required'     => '※商品価格を設定して下さい',
		    'price.integer'      => '※商品価格は整数で設定して下さい',
	    ];
    }
}
