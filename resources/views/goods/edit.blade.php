<table>
<form action="/goods/{{ $good->id }}" method="post" enctype="multipart/form-data">
	<input name="_method" type="hidden" value="PUT">
	{{ csrf_field() }}
	<tr> <th>image:</th> <td><input type="file" name="image" value="{{ $good->image }}"></td></tr>
	<tr> <th>title:</th> <td><input type="text" name="title" value="{{ $good->title }}"></td></tr>
	<tr> <th>desc: </th> <td><input type="text" name="desc" value="{{ $good->desc }}"></td></tr>
	<tr> <th>price:</th> <td><input type="number" name="price" value="{{ $good->price }}"></td></tr>
	<tr> <th>      </th> <td><input type="submit" value="update"></td></tr>
</form>
</table>

