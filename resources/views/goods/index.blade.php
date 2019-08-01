@extends('layouts/goodsapp')

@section('title', '商品一覧')

@section('content')
	<form action="/goods/create" method="get">
		<button> 新規商品登録 </button>
	</form>

	<table>
		<tr>
			<th> 商品画像 </th>
			<th> 商品名 </th>
			<th> 説明 </th>
			<th> 価格 </th>
			<th> </th>
		</tr>
	@foreach ( $goods as $good )
		{{ csrf_field() }}
		<tr> 
			<td><img src="/storage/{{ $good->imagePath }}" width="100" height="100"></td>
			<td> {{ $good->title }} </td>
			<td> {{ $good->desc  }} </td>
			<td> {{ $good->price }}円 </td>
			<td> 
				<form action="/goods/{{ $good->id }}/edit" method="get">
					<button> 商品編集 </button>
				</form>
				@include('goods.delete') 
			</td>
		</tr>
	@endforeach
	</table>
@endsection

@section('footer')
	copyright 2019 makoto
@endsection


