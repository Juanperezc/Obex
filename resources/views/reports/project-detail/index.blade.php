@extends('layouts.app')

@section('title', 'Proyecto')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2>Contrato con Zender Company</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Estatus:</dt> <dd><span class="label label-primary">Activo</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Messages:</dt> <dd>  162</dd>
                                        <dt>Cliente:</dt> <dd><a href="#" class="text-navy"> Zender Company</a> </dd>
                                        <dt>Version:</dt> <dd> 	v1.4.2 </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal">

                                        <dt>Ultima Actualizacion:</dt> <dd>16.08.2014 12:15:57</dd>
                                        <dt>Creado:</dt> <dd> 	10.07.2014 23:36:57 </dd>
                                        <dt>Participantes:</dt>
                                        <dd class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                                        <a href=""><img alt="image" class="img-circle" src="/images/a1.png"></a>
                                        <a href=""><img alt="image" class="img-circle" src="/images/a2.png"></a>
                                        <a href=""><img alt="image" class="img-circle" src="/images/a4.png"></a>
                                        <a href=""><img alt="image" class="img-circle" src="/images/a5.png"></a>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                            <small>Proyecto completado en <strong>60%</strong></small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab-1" data-toggle="tab" aria-expanded="true">Actividades</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                
                                <div class="tab-pane active" id="tab-1">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Estatus</th>
                                            <th>Titulo</th>
                                            <th>Inicio</th>
                                            <th>Finalizacion</th>
                                            <th>Comentarios</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                            </td>
                                            <td>
                                                Crear proyecto en webapp
                                            </td>
                                            <td>
                                               12.07.2014 10:10:1
                                            </td>
                                            <td>
                                                14.07.2014 10:16:36
                                            </td>
                                            <td>
                                            <p class="small">
                                                Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                            </p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                            </td>
                                            <td>
                                                Various versions
                                            </td>
                                            <td>
                                                12.07.2014 10:10:1
                                            </td>
                                            <td>
                                                14.07.2014 10:16:36
                                            </td>
                                            <td>
                                                <p class="small">
                                                    varias versiones han evolucionado con los años.
                                                </p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                            </td>
                                            <td>
                                                Hay muchas variaciones
                                            </td>
                                            <td>
                                                12.07.2014 10:10:1
                                            </td>
                                            <td>
                                                14.07.2014 10:16:36
                                            </td>
                                            <td>
                                                <p class="small">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea nihil quibusdam maxime non assumenda. Consequatur praesentium fugit exercitationem incidunt, illum, optio voluptatum, debitis aliquid eligendi obcaecati error ab laborum rerum.
                                                </p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                            </td>
                                            <td>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facere neque, est, corporis sint officia minus nisi adipisci pariatur fuga commodi recusandae sed laudantium itaque. Voluptatem rem molestias voluptatum pariatur!
                                            </td>
                                            <td>
                                                12.07.2014 10:10:1
                                            </td>
                                            <td>
                                                14.07.2014 10:16:36
                                            </td>
                                            <td>
                                                <p class="small">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur non eos esse velit, dolorum aspernatur. Et dolores placeat dolore odio, delectus cumque ut reprehenderit vitae unde libero, ab, voluptatem atque.
                                                </p>
                                            </td>

                                        </tr>
                           

                                        </tbody>
                                    </table>

                                </div>
                                </div>

                                </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="wrapper wrapper-content project-manager">
                    <h4>Descripcion del proyecto:</h4>
                    <img src="/images/clientlogo.png" class="img-responsive">
                    <p class="small">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                    </p>
                   
                    <div class="text-center m-t-md">
                        <a href="#" class="btn btn-xs btn-primary">Ver en pdf</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
