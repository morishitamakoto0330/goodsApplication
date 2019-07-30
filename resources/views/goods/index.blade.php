<table>
@foreach ( $goods as $good )
	{{ csrf_field() }}
	<tr> 
		<th>image:</th> 
		<td><img src="/storage/{{ $good->imagePath }}"></td>
	</tr>

	<tr> 
		<th>title:</th> 
		<td> {{ $good->title }} </td>
	</tr>

	<tr> 
		<th>desc: </th> 
		<td> {{ $good->desc  }} </td>
	</tr>

	<tr> 
		<th>price:</th> 
		<td> {{ $good->price }} </td>
	</tr>
@endforeach
</table>

