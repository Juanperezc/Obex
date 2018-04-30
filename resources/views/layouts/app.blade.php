<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INSPINIA - @yield('title') </title>

   <!-- <link href="/public/images/Obex.ico" rel="shortcut icon" type="image/x-icon" />
-->
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">
<div id='app' >
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
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
     ]); ?>
     </script>

@section('scripts')
@show

</body>
</html>
