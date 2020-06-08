@extends('admin.master')


@section('content')

<div class="d-flex justify-content-end mb-2">
<a href = "{{ route('user.create')}}" class="btn btn-success">Add users</a>
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
<th>Permissions</th>
<th>delete</th>
<th>actions</th>
<th>status</th>


</thead>

<tbody>
@foreach($users as $user)
<tr>

<td>

<img src="{{ asset($user->profile->avatar) }}" alt="Card image cap">

</td>


<td>
{{ $user->name }}
</td>

<td>
{{ $user->email }}
</td>

<td>

permissions

</td>

<td>
 
 delete

</td>

<td>

@if(auth()->user()->isAdmin())

<form action="{{ route('users.not-admin', $user->id) }}" method="POST">
@csrf
<button class="btn btn-danger btn-sm">Remove priviledges</button>

</form>

@else 

<form action="{{ route('users.make-admin', $user->id) }}" method="POST">
@csrf
<button class="btn btn-success btn-sm">Make Admin</button>

</form>
@endif

</td>


<td>
 @if(Auth::id() !== $user->id )
    <a href="{{ route('user.profile.delete', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
 @endif

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