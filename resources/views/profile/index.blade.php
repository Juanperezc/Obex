@extends('layouts.app') @section('title', 'Construcción') @section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Detalle del Perfil</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right" style="text-align:center;">
                        <div >
                            @if ($message = Session::get('success'))

                            <div class="alert alert-success alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>

                            @endif @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>
                                There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div >

                            <div class="profile-header-container">
                                <div class="profile-header-img">
                                    <img class="rounded-circle avatar-profile" src="/storage/avatars/{{$user->profile_img }}"/>
                                  
                                </div>
                            </div>

                        </div>
                        <div >
                            <form action="/profile" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <center><input
                                        type="file"
                                        class="form-control-file"
                                        name="avatar"
                                        id="avatarFile"
                                        aria-describedby="fileHelp"></center>  
                                    <small id="fileHelp" class="form-text text-muted"><p>Porfavor sube una imagen valida.</p><p></p>El tamaño de la imagen no puede ser mayor a 2MB.</p>/small>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content profile-content">
                        <h4>
                            <strong>$user->name</strong>
                        </h4>
                        

                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        Editar Perfil
                    </h5>

                </div>
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection