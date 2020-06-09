<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('back_end/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

    @yield('css')
</head>   
<body class="app sidebar-mini rtl">

@include('admin.partials.header')
@include('admin.partials.sidebar')


<main class="app-content" id="app">
@yield('content')
</main>

<script src="{{ asset('back_end/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('back_end/js/popper.min.js') }}"></script>
    <script src="{{ asset('back_end/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back_end/js/main.js') }}"></script>
<script src="{{ asset('back_end/js/plugins/pace.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>