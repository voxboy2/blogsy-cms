@extends('admin.master')

@section('content')
<div class="card card-default">

<div class="card-header">Create User</div>
<div class="card-body">

@include('partials.errors')
<form action="{{ route('settings.update') }}" method="POST">
@csrf


<div class = "form-group">
    <label for="site name">Site name</label>
    <input type="text" id="site_name" value="{{ $settings->site_name }} "class="form-control" name="site_name">
</div> 

<div class = "form-group">
    <label for="address">Address</label>
    <input type="text" id="site_name" value="{{ $settings->address }} "class="form-control" name="address">
</div> 

<div class = "form-group">
    <label for="contact_number">Contact number</label>
    <input type="text" id="contact_number" value="{{ $settings->contact_number }}" class="form-control" name="contact_number">
</div> 

<div class = "form-group"> 
    <label for="email">Contact Email</label>
    <input type="email" id="contact_email" value="{{ $settings->contact_email }}" class="form-control" name="contact_email">
</div> 

<button class="btn btn-mini">update</button>

</form>
</div>
</div>
@endsection