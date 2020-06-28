@extends('admin.master')

@section('content')
<div class="card card-default">

<div class="card-header">Create User</div>
<div class="card-body">

@include('flash')
<form action="{{ route('user.store') }}" method="POST">
@csrf


<div class = "form-group">
    <label for="name">User</label>
    <input type="text" id="name" class="form-control" name="name">
</div> 

<div class = "form-group"> 
    <label for="name">Email</label>
    <input type="text" id="email" class="form-control" name="email">
</div> 

<button class="btn btn-mini">create user</button>

</form>
</div>
</div>
@endsection