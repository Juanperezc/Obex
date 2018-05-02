<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                       <center> <span class="clear">
                            <span class="block m-t-xs">
                                <!--<img class="logo_menu" src="{{asset('images/LOGO2v2.png')}}"/>-->
                                <img alt="image" class="img-profile" src="/images/a5.png">
                                <br/>
                                <strong class="font-bold">{{Auth::user()->name}}</strong>
                          <!--  </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span> -->
                        </span></center>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Salir</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Obex
                </div>
            </li>
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            @role('admin')
            <li class="{{ areActiveRoutes(['manage-account.client', 'manage-account.user']) }}">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Gestionar Cuentas</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="{{ isActiveRoute('manage-account.client') }}">
                <a href="{{ url('/manage-account/client') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Registrar Clientes</span> </a>
            </li>
            </ul>
            </li>
            @endrole
            @role('admin|manager')
            <li class="{{ isActiveRoute('manage-resource') }}">
                <a href="{{ url('/manage-resource') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Gestion de recursos</span> </a>
            </li>
            @endrole
            @role('admin|manager')
            <li class="{{ areActiveRoutes(['report.team', 'report.project']) }}" >
                <a href="#"><i class="fa fa-archive"></i> <span class="nav-label">Reportes</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="{{ isActiveRoute('report.team') }}"><a href="{{ url('/report/team') }}" >Equipo</a></li>
                <li class="{{ isActiveRoute('report.project') }}"><a href="{{ url('/report/project') }}" >Proyecto</a></li></ul>
            </li>
            @endrole
         
          
            <li class="{{ isActiveRoute('manage-notification') }}">
                <a href="{{ url('/manage-notification') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Notificaciones al cliente(?)</span> </a>
            </li>
        </ul>

    </div>
</nav>
