@extends('layouts.app')

@section('title', 'Proyectos')

@section('content') 
<div class = "wrapper wrapper-content animated fadeInRight" > <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">
        <activity-table id="{{$id}}"></activity-table>
        </div>
    </div>
</div>
</div>
@endsection
