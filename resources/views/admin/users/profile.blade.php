@extends('admin.master')

@section('content')
<div class="card card-default">

<div class="card-header">Edit your profile</div>
<div class="card-body">

@include('flash')

<form action="{{ route('user.profile.update') }}" method="POST">
@csrf


<div class = "form-group">
    <label for="name">User</label>
    <input type="text" id="name" class="form-control" value = "{{ $user->name }}" name="name">
</div> 

<div class = "form-group"> 
    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" value = "{{ $user->email }}" name="email">
</div> 

<div class = "form-group"> 
    <label for="password">New Password</label>
    <input type="password" id="password" class="form-control" name="password">
</div> 

<div class = "form-group"> 
    <label for="about">About</label>
    <textarea name="about" id="about" cols="6" rows="6" class="form-control" value = "{{ $user->profile->about }}" name="about"></textarea>
</div> 

<div class = "form-group"> 
    <label for="avatar">Upload new avatar</label>
    <input type="file" id="avatar" class="form-control" value = "{{ $user->profile->avatar }}" name="avatar">
</div> 


<div class = "form-group"> 
    <label for="facebook">FaceBook</label>
    <input type="url" id="facbook" class="form-control" value = "{{ $user->profile->facebook }}" name="facebook">
</div> 

<div class = "form-group"> 
    <label for="youtube">Youtube</label>
    <input type="url" id="youtube" class="form-control" value = "{{ $user->profile->youtube }}" name="youtube">
</div> 

<button class="btn btn-mini">update profile</button>

</form>
</div>
</div>
@endsection