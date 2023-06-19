<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->


    <link href="{{asset('admin/img/logo1.jpg')}}" rel="icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap-icons.css')}}">
      <link rel="stylesheet"href="{{asset('admin/css/boxicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/quill.snow.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/quill.bubble.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/remixicon.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/simple-datatables.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">


    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="{{ asset('asset/css/boostrap.min.css')}}">
    @livewireStyles
</head>
<body>

    @include('layouts.inc.admin.adminNavbar')
    @include('layouts.inc.admin.sidebar')

    <main id="main" class="main">
        @yield('content')
    </main>
    
 




    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
    <script src="{{asset('admin/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/js/chart.min.js')}}"></script>
    <script src="{{asset('admin/js/echarts.min.js')}}"></script>
    <script src="{{asset('admin/js/quill.min.js')}}"></script>
    <script src="{{'admin/js/simple-datatables.js'}}"></script>
    <script src="{{asset('admin/js/tinymce.min.js')}}"></script>
    <script src="{{('admin/js/validate.js')}}"></script>
    <script src="{{asset('admin/js/main.js')}}"></script> 

    <script src="{{asset('admin/js/boostrap.bundle.js')}}"></script>
    <script src="{{asset('admin/js/jquery.js')}}"></script>
    @livewireStyles
    @stack('script')
</body>
</html>