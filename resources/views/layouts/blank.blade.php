<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Obex - @yield('title') </title>
  <!--  <link href="/images/Obex.ico" rel="shortcut icon" type="image/x-icon" /> -->
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body class="gray-bg body-login">

  <div id='app' >
 
            <!-- Main view  -->
            @yield('content')
     
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
