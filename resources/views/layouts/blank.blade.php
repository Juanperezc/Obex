<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INSPINIA - @yield('title') </title>

    <link href="/public/images/Obex.ico" rel="shortcut icon" type="image/x-icon" />

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

</head>
<body class="gray-bg">

  <div id='app' >
            <!-- Main view  -->
            @yield('content')
     
</div>

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{{ mix('/js/main.js') }}"></script>    <script>
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
     ]); ?>
     </script>
@section('scripts')
@show

</body>
</html>
