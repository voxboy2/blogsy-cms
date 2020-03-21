@extends('layouts.app')


@section('content')
 
 <div class="d-flex justify-content-end mb-2">
 <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tag</a>
 </div>

 <div class = "card card-default">
 <div class="card-header">tags</div>

<div class="card-body">
<table class = "table">
<thead>

<th>Name</th>
<th>Posts Count</th>



</thead>

<tbody>
@foreach($tags as $tag)

<tr>
<td>
{{ $tag->name }}
</td>

<td>
{{ $tag->posts->count() }}
</td>

<td>
<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>
</td>

<td>

<form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger  btn-sm">
Delete

</button>

</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
 </div>
 
@endsection