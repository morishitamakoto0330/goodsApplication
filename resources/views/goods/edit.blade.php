@extends('layouts/goodsapp')

@section('title', '商品編集')

@section('content')

	@if (count($errors) > 0)
		<p class="error"> 入力に問題があります。再入力して下さい。 </p>
	@endif

	<table>
	<form action="/goods/{{ $good->id }}" method="post" enctype="multipart/form-data">
		<input name="_method" type="hidden" value="PUT">
		{{ csrf_field() }}

		@if ($errors->has('image'))
			<tr> <th> </th> <td> <p class="error-message"> {{ $errors->first('image') }} </p> </td></tr>
		@endif
		<tr> 
			<th>商品画像：</th> 
			<td>
				<img src="/storage/{{ $good->imagePath }}" width="100" height="100">
				<input type="file" name="image" value="">
			</td>
		</tr>
		@if ($errors->has('title'))
			<tr> <th> </th> <td>{{ $errors->first('title') }}</td></tr>
		@endif
		<tr> <th>商品タイトル：</th> <td><input type="text" name="title" value="{{ $good->title }}"></td></tr>
		@if ($errors->has('desc'))
			<tr> <th> </th> <td>{{ $errors->first('desc') }}</td></tr>
		@endif
		<tr> <th>　　　　説明：</th> <td><input type="text" name="desc" value="{{ $good->desc }}"></td></tr>
		@if ($errors->has('price'))
			<tr> <th> </th> <td>{{ $errors->first('price') }}</td></tr>
		@endif
		<tr> <th>　　　　価格：</th> <td><input type="number" name="price" value="{{ $good->price }}"></td></tr>

		<tr> <th></th> <td><input type="submit" value="更新"></td> </tr>
	</form>
	</table>
@endsection

@section('footer')
	copyright 2019 makoto
@endsection



