@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
 <clients-detail id="{{$id}}" ></clients-detail>
    </div>
@endsection
