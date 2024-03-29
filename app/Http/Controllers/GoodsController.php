<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Shop;
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
	    $shops = Shop::all();

	    $shopNames = array();
	    foreach($goods as $good) {
		    $shop = Shop::find($good->shopId);
		    array_push($shopNames, $shop->name);
	    }

	    return view('goods.index', ['goods' => $goods, 'shopNames' => $shopNames, 'shops' => $shops]);
    }

    /**
     * 商品の新規作成フォームを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $shops = Shop::all();

	    return view('goods.create', ['shops' => $shops]);
    }

    /**
     * 商品をデータベースに保存する
     * 画像ファイルは"../storage/app/public" 配下に保存する
     * ajax通信の場合は全商品データのJSONを返す
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
	    $good->shopId = $request->shopId;
	    $good->save();

	    if($request->ajax()) {
		    $goods = Good::all();
		    return $goods;
	    }

	    return redirect('/goods');
    }

    /**
     * 特定の商品を表示する
     * 商品は検索テキストと店舗IDで絞り込む
     * 検索テキストは商品タイトルのみ走査する
     * ajax通信の場合は特定の商品データのJSONを返す
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
	    $goodsAll = ($request->shopId == 0) ? Good::all() : Good::where('shopId', $request->shopId)->get();
	    $goods = array();
	    $shopNames = array();

	    foreach($goodsAll as $good) {
		    if(strpos($good->title, $request->text) !== false) {
			    $goods[] = $good;
			    $shop = Shop::find($good->shopId);
			    array_push($shopNames, $shop->name);
		    }
	    }

	    if($request->ajax()) {
		    return $goods;
	    }

	    return view('goods.show', ['goods' => $goods, 'shopNames' => $shopNames]);
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
	    $shops = Shop::all();

	    return view('goods.edit', ['good' => $good, 'shops' => $shops]);
    }

    /**
     * 特定の商品データを更新する
     * 画像ファイルは"../storage/app/public" 配下に保存する
     * 以前の画像ファイルは削除する
     * ajax通信の場合は全商品データのJSONを返す
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
	    unlink("../storage/app/public/" . $good->imagePath);
	    $good->imagePath = $path;
	    $good->title = $request->title;
	    $good->desc = $request->desc;
	    $good->price = $request->price;
	    $good->shopId = $request->shopId;
	    $good->save();

	    if($request->ajax()) {
		    $goods = Good::all();
		    return $goods;
	    }

	    return redirect('/goods');
    }

    /**
     * データベースから特定の商品を削除する
     * "../storage/app/public" 配下の画像ファイルも削除する
     * ajax通信の場合は全商品データのJSONを返す
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
	    $good = Good::find($id);
	    unlink("../storage/app/public/" . $good->imagePath);
	    $good->delete();

	    if($request->ajax()) {
		    $goods = Good::all();
		    return $goods;
	    }

	    return redirect('/goods');
    }
}


