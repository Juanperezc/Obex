@extends('layouts.app-nh') @section('title', 'Inicio') @section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-6">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-bell fa-4x"></i>
                    <h1 class="m-xs">5</h1>
                    <h3 class="font-bold no-margins">
                        Nuevas Notificaciones
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-calendar fa-4x"></i>
                    <h1 class="m-xs">Hoy es:</h1>
                   <h3 class="font-bold no-margins">
                        23 de mayo del 2018
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-capitalize">
                <center>Ultimas actividades</center>
            </h2>
            <div class="ibox-content" id="ibox-content">
                <div id="vertical-timeline" class="vertical-container dark-timeline">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2 class="product-name ">
                                <center>Proyecto 1</center>
                            </h2>
                            <hr class="hr-line-solid">
                            <span>Actividad 8</span>
                            <p>Diseño de las vistas de la pagina de zender
                            </p>
                            <a href="#" class="btn btn-sm btn-primary">Ir al proyecto</a>
                            <span class="vertical-date">
                                Hoy
                                <br/>
                                <small>Fecha: May 23</small>
                            </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2 class="product-name ">
                                <center>Proyecto 3</center>
                            </h2>
                            <hr class="hr-line-solid">
                            <span>Actividad 5</span>
                            <p>Diseño inicial de la landing page
                            </p>
                            <a href="#" class="btn btn-sm btn-primary">Ir al proyecto</a>
                            <span class="vertical-date">
                                Hoy
                                <br/>
                                <small>Fecha: May 23</small>
                            </span>
                        </div>

                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2 class="product-name ">
                                <center>Proyecto 4</center>
                            </h2>
                            <hr class="hr-line-solid">
                            <span>Actividad 1</span>
                            <p>Reunion con el equipo de trabajo y el cliente
                            </p>
                            <a href="#" class="btn btn-sm btn-primary">Ir al proyecto</a>
                            <span class="vertical-date">
                                Mañana
                                <br/>
                                <small>Fecha: May 24</small>
                            </span>
                        </div>

                    </div>

                </div>
            </div>


            <!-- <div class="ibox">
                <div class="ibox-content">
                    <p class="font-bold">
                        Ultimas activivades
                    </p>
                    <hr/>
                    <div>
                        <h2 class="product-name">Proyecto 1</h2>
                        <br/>
                        <span class="product-name">Actividad 5</span>
                        <div class="small m-t-xs">
                            Diseño de las vistas de la pagina de zender
                        </div>
                        <div class="small m-t-xs">
                            Fecha de entrega: 01-07-19
                        </div>
                        <div class="m-t text-righ">

                            <a href="#" class="btn btn-xs btn-outline btn-primary">Ir al proyecto
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <hr/>
                    <div>
                        <h2 class="product-name">Proyecto 3</h2>
                        <br/>
                        <span class="product-name">Actividad 7</span>
                        <div class="small m-t-xs">
                            Reunion para mostrar prototipo de pagina
                        </div>
                        <div class="small m-t-xs">
                            Fecha de entrega: 29-05-19
                        </div>
                        <div class="m-t text-righ">

                            <a href="#" class="btn btn-xs btn-outline btn-primary">Ir al proyecto
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div> -->
        </div>
        <div class="col-md-3">

        </div>
    </div>

</div>

@endsection