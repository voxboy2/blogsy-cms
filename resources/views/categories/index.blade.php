@extends('layouts.app')


@section('content')
 
 <div class="d-flex justify-content-end mb-2">
 <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
 </div>

 <div class = "card card-default">
 <div class="card-header">categories</div>

<div class="card-body">
<table class = "table">
<thead>

<th>Name</th>
<th>Posts Count</th>



</thead>

<tbody>
@foreach($categories as $category)

<tr>
<td>
{{ $category->name }}
</td>

<td>
{{ $category->posts->count() }}
</td>

<td>
<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
</td>


<td>

<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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