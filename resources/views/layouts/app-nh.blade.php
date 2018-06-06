<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="Auth::user()">
    
    <title>Obex - @yield('title') </title>

    <!--<link href="/images/Obex.ico" rel="shortcut icon" type="image/x-icon" />-->
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">
        
<div id='app' :permissions="{{ auth()->user()->roles()->get() }}"   :user="{{ auth()->user() }}"  >
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            
            <!-- Page wrapper -->
            @include('layouts.topnavbar')

   
            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->
</div>
    </div>
    <!-- End wrapper-->
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'roles' => Auth::user()->roles()->get(),
        'user' => Auth::user()
    ]) !!};
    </script>

@section('scripts')
@show

</body>
</html>
