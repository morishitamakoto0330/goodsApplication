@extends('layouts/goodsapp')

@section('title', '検索結果')

@section('content')
	<table>
		<tr>
			<th> 商品画像 </th>
			<th> 商品タイトル </th>
			<th> 説明 </th>
			<th> 価格 </th>
			<th> 店舗 </th>
		</tr>
	@foreach ( $goods as $index => $good )
		<!-- 商品タイトルは50文字，商品説明は100文字辺りで折り返すように改行コードを挿入する -->
		<!-- 商品価格は見やすさのために3桁ごとにカンマを付ける -->
		@php
			$title = $good->title;
			$lineWidth = 50;
			$num = strlen($title)/$lineWidth;
			for($i = 1; $i <= $num; $i++) {
				$insertIndex = $i*$lineWidth + $i - 1;
				$targetStr = mb_strcut($title, $insertIndex, 4);
				$slide = 1;
				for(; $slide <= 4; $slide++) {
					$strNext = mb_strcut($title, $insertIndex + $slide, 4);
					if(strcmp($targetStr, $strNext) !== 0) break;
				}
				$title = substr_replace($title, "\n", $insertIndex + $slide, 0);
			}

			$desc = $good->desc;
			$lineWidth = 100;
			$num = strlen($desc)/$lineWidth;
			for($i = 1; $i <= $num; $i++) {
				$insertIndex = $i*$lineWidth + $i - 1;
				$targetStr = mb_strcut($desc, $insertIndex, 4);
				$slide = 1;
				for(; $slide <= 4; $slide++) {
					$strNext = mb_strcut($desc, $insertIndex + $slide, 4);
					if(strcmp($targetStr, $strNext) !== 0) break;
				}
				$desc = substr_replace($desc, "\n", $insertIndex + $slide, 0);
			}

			$price = strval($good->price);
			$commaWidth = 3;
			$num = (strlen($price) - 1)/$commaWidth;
			for($i = 1; $i <= $num; $i++) {
				$price = substr_replace($price, ",", (strlen($price) - ($i*$commaWidth + $i - 1)), 0);
			}
			
		@endphp
		{{ csrf_field() }}
		<tr> 
			<td><img class="good-image" src="/storage/{{ $good->imagePath }}" ></td>
			<td> {!! nl2br(e($title)) !!} </td>
			<td> {!! nl2br(e($desc))  !!} </td>
			<td align="right"> {{ $price }}円 </td>
			<td> {{ $shopNames[$index] }} </td>
		</tr>
	@endforeach
	</table>
@endsection

@section('footer')
	copyright 2019 makoto
@endsection


