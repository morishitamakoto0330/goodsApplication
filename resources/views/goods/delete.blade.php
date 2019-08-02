<form action="/goods/{{ $good->id }}" method="post" >
	<input name="_method" type="hidden" value="DELETE">
	{{ csrf_field() }}
	<input type="submit" value="商品削除"></td>
</form>

