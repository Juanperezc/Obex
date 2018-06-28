@extends('layouts.landing')

@section('content')

<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">OBEX</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right  navbar-brand2">
                        <li><a class="page-scroll" href="#page-top">Inicio</a></li>
                        <li><a class="page-scroll" href="#features">Aumenta tu visivilidad web</a></li>
                        <li><a class="page-scroll" href="#team">¿Quienes somos?</a></li>
                        <li><a class="page-scroll" href="#testimonials">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<br/>
<br/>
<br/>
<br/>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Visibilidad<br/>
                        La mejor opcion<br/>
                        si desea incursionar<br/>
                        en el ambito web</h1>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a>
                    </p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1 style="color: white">Donde quieras <br/> Cuando quieras</h1>
                    <p style="color: white">100% en todas las pataformas</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a></p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="features" class="container services" style="color: white">
    <div class="row">
        <div class="col-sm-3">
            <h2>Completamente Adaptable</h2>
            <p>El sistema se adapta a todo tipo de plataformas brindado una mayor recepcion del producto.</p>
           
        </div>
        <div class="col-sm-3">
            <h2>Menos Documentos Fisicos</h2>
            <p>Ahorrando el uso de excesivo material fisico para el desarrollo de productos.</p>
           
        </div>
        <div class="col-sm-3">
            <h2>Facilitando el acceso</h2>
            <p>Desde la casa u oficina.</p>
            
        </div>
        <div class="col-sm-3">
            <h2>Apuntando al Futuro</h2>
            <p>Usando la tecnologia de punta para el desarrollo de productos de calidad a un menor tiempo y costo.</p>
            
        </div>
    </div>
</section>


<section id="team" class="gray-section team">
    <div class="container" style="color: black">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Nuestro Equipo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 wow fadeInLeft">
                <div class="team-member">
                    <img src="images/Isaac.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Isacc</span> Perez</h4>
                    <p>Gestor de Soporte y Representante de Usuarios</p>
                    
                </div>
            </div>
            <div class="col-sm-3">
                <div class="team-member wow">
                    <img src="images/Juan.jpeg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Juan</span> Perez</h4>
                    <p>Arquitecto de SW y Jefe Programador</p>
                    <br>
                    
                </div>
            </div>
            <div class="col-sm-3 wow">
                <div class="team-member">
                    <img src="images/marco_padua.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Marco</span> Padua</h4>
                    <p>Lider del proyecto, Analista y Arquitecto de SW</p>
                    
                </div>
            </div>
            <div class="col-sm-3 wow fadeInRight">
                <div class="team-member">
                    <img src="images/marco.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">Marco</span> Saenz</h4>
                    <p>Analista, Arquitecto de SW y Experto en Pruebas</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="timeline gray-section" style="color: black">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Nuestro Flujo de Trabajo</h1>
            </div>
        </div>
        <div class="row features-block">

            <div class="col-lg-12">
                <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Conocer</h2>
                            <p>Se realiza una reunion con el cliente, para tener un primer contacto y poseer una idea preliminar de lo que se quiere.
                            </p>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Planificar</h2>
                            <p>Se realiza un plan de trabajo para abordar todo lo que comprende el sistema solucion o servicio que desea el cliente.</p>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Ejecutar</h2>
                            <p>Se ejecuta el plan de trabajo. </p>
                        </div>
                    </div>
                    
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-thumbs-o-up"></i>
                        </div>

                        <div class="vertical-timeline-content">
                            <h2>Esperar resultados</h2>
                            <p>Se brindara de un repote con todo lo relevnate a su servicio y ofertas de futuros servicios.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>


<section id="contact" class="gray-section contact" style="color: black">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contactanos</h1>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Obex.ca </span></strong><br/>
                    Calle 20 entre carreras 18 y 19,<br/>
                    barquisimeto, Lara, Venezuela<br/>
                    <abbr title="Phone">Tlf:</abbr> +58 (416) 450-3046
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Envianos un Mensaje</a>
               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2018 Obex</strong><br/></p>
            </div>
        </div>
    </div>
</section>

@endsection
