<table>
<form action="/goods" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<tr> <th>image:</th> <td><input type="file" name="image" value=""></td></tr>
	<tr> <th>title:</th> <td><input type="text" name="title" value="{{ old('title') }}"></td></tr>
	<tr> <th>desc: </th> <td><input type="text" name="desc" value="{{ old('desc') }}"></td></tr>
	<tr> <th>price:</th> <td><input type="number" name="price" value="{{ old('price') }}"></td></tr>
	<tr> <th>      </th> <td><input type="submit" value="send"></td></tr>
</form>
</table>

