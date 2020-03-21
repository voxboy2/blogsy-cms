@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')

@@parent<p>This is appended to the master sidebar</p>


@endsection

@section('content')
<p>This is my account</p>

hello, {{ $name }}

@endsection

<!-- 
this file extends from the master file

the 'title' keyword helps us render the page title
note that the page title can be anything aside "Page Title"
we use ("Page title") in this example -->

we use @{{name}} expression to make sure the expression remains untouched
if we have large javascript variables etc we want untouced we use the @verbatim directive


@auth
 <!-- this user is authenticated  -->
@endauth

@guest
<!--  this user is not authenticated -->
@endguest
