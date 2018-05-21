@extends('layouts.app')

@section('title', 'Proyecto')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
 <project-detail id="{{$id}}" ></project-detail>
      
    </div>
@endsection
