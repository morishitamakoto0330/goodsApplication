<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1> 商品一覧 </h1>

<form action="/goods/create" method="get">
	<button> 新規商品登録 </button>
</form>

<table>
	<tr>
		<th> id </th>
		<th> 商品画像 </th>
		<th> 商品名 </th>
		<th> 説明 </th>
		<th> 価格 </th>
		<th> </th>
	</tr>
@foreach ( $goods as $good )
	{{ csrf_field() }}
	<tr> 
		<td> {{ $good->id }} </td>
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

