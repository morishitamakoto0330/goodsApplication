<table>
<form action="/goods/{{ $id }}" method="post" enctype="multipart/form-data">
	<input name="_method" type="hidden" value="DELETE">
	{{ csrf_field() }}
	<input type="submit" value="delete"></td>
</form>
</table>

