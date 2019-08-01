<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Http\Requests\GoodRequest;

class GoodsController extends Controller
{
    /**
     * 商品のリストを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $goods = Good::all();

	    return view('goods.index', ['goods' => $goods]);
    }

    /**
     * 商品の新規作成フォームを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('goods.create');
    }

    /**
     * 商品をデータベースに保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {
	    $path = $request->image->store('public');
	    $path = str_replace("public/", "", $path);

	    $good = new Good;
	    $good->imagePath = $path;
	    $good->title = $request->title;
	    $good->desc = $request->desc;
	    $good->price = $request->price;
	    $good->save();

	    return redirect('/goods');
    }

    /**
     * 特定の商品を表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $good = Good::find($id);

	    return $good->toArray();
    }

    /**
     * 特定の商品の編集フォームを表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $good = Good::find($id);

	    return view('goods.edit', ['good' => $good]);
    }

    /**
     * 特定の商品データを更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodRequest $request, $id)
    {
	    $path = $request->image->store('public');
	    $path = str_replace("public/", "", $path);

	    $good = Good::find($id);
	    $good->imagePath = $path;
	    $good->title = $request->title;
	    $good->desc = $request->desc;
	    $good->price = $request->price;
	    $good->save();

	    return redirect('/goods');
    }

    /**
     * データベースから特定の商品を削除する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $good = Good::find($id);
	    $good->delete();

	    return redirect('/goods');
    }
}


