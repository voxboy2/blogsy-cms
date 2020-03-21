@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-end mb-2">
<a href = "{{ route('users.index') }}" class="btn btn-success">Add posts</a>
</div>


<div class="card card-default">

<div class="card-header">Posts</div>


 <div class="card-body">
 @if($users->count() > 0)
  <table class="table">
   <thead>
<th>Image</th>
<th>Name</th>
<th>Email</th>


</thead>

<tbody>
@foreach($users as $user)
<tr>

<td>
{{ $user->image }}
</td>


<td>
{{ $user->name }}
</td>

<td>
{{ $user->email }}
</td>


<td>

@if(!$user->isAdmin())

<form action="{{ route('users.make-admin', $user->id) }}" method="POST">
@csrf
<button class="btn btn-success btn-sm">Make Admin</button>
@endif
</form>

</td>
</tr>
@endforeach
</tbody>

</table>

@else 
<h3 class = "text-center">No Users yet</h3>

@endif

</div>

</div>






@endsection