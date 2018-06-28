@extends('layouts.app-nh') @section('title', 'Inicio') @section('content')
<div class="wrapper wrapper-content animated fadeInRight">
 
  <home-component date="{{ getActualdate()}}"></home-component>

</div>

@endsection