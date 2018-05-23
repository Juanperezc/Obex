@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">

<div class="ibox">
    <div class="ibox-title">
        <h5>Todos los proyectos</h5>
        <div class="ibox-tools">
        <a href="/panel/project/create" class="btn btn-primary btn-xs">Crear nuevo proyecto</a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row m-b-sm m-t-sm">
            <div class="col-md-1">
                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Recargar</button>
            </div>
            <div class="col-md-11">
                <div class="input-group"><input type="text" placeholder="Buscar" class="input-sm form-control"> <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-primary"> Buscar</button> </span></div>
            </div>
        </div>

        <div class="project-list">
        <project-table ></project-table>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>
@endsection
