<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <center>
                            <img alt="image" class="img-profile" src="/storage/avatars/{{Auth::user()->profile_img}}"></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">{{Auth::user()->name}}</strong>
                                    </span>
                                    <span class="text-muted text-xs block">Art Director
                                        <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="{{ route('profile')  }}">Perfil</a>
                                </li>

                                <li>
                                    <a href="{{ route('logout')  }}">Salir</a>
                                </li>
                            </ul>
                        </center>
                    </div>

                    <div class="logo-element">
                        Obex
                    </div>
                </li>
                <li class="{{ isActiveRoute('main') }}">
                    <a href="{{ url('panel/') }}">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Inicio</span>
                    </a>
                </li>
                @role('admin')
                <li
                    class="{{ areActiveRoutes(['manage-account.user-register', 'manage-account.user-management','manage-account.client-register','manage-account.client-management']) }}">
                    <a href="#">
                        <i class="fa fa-gears"></i>
                        <span class="nav-label">Gestionar Cuentas</span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ isActiveRoute('manage-account.client-register') }}">
                            <a href="{{ url('panel/manage-account/client-register') }}">
                                <i class="fa fa-plus"></i>
                                Gestionar Clientes
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('manage-account.user-register') }}">
                            <a href="{{ url('panel/manage-account/user-register') }}">
                            <i class="fa fa-plus"></i>Gestionar Usuarios</a>
                        </li>
                    </ul>
                </li>
                @endrole
         
            @role('admin|manager')
            <li class="{{ areActiveRoutes(['project.view','project.create','project.resources','project.modify']) }}">
                <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Proyectos</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="{{ isActiveRoute('project.view') }}"><a href="{{ url('panel/project/') }}" ><i class="fa fa-eye"></i>Ver Proyectos</a></li>
                <li class="{{ isActiveRoute('project.create') }}"><a href="{{ url('panel/project/create') }}"><i class="fa fa-plus"></i>Crear Proyecto</a></li>
                <li class="{{ isActiveRoute('project.resources') }}"><a href="{{ url('panel/project/resources') }}" ><i class="fa fa-stack-overflow"></i>Gestionar Recursos</a></li>

                </ul>
            </li>
            @endrole
            @role('admin|manager')
            <li class="{{ areActiveRoutes(['team.view','team.areas']) }}">
                <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Equipos</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="{{ isActiveRoute('team.view') }}"><a href="{{ url('panel/team/') }}" ><i class="fa fa-eye"></i>Gestionar Equipos</a></li>
                <li class="{{ isActiveRoute('team.areas') }}"><a href="{{ url('panel/team/areas') }}" ><i class="fa fa-plus"></i>Gestionar Areas</a></li>
               
                </ul>
            </li>
            @endrole
            @role('admin|manager')
            <li class="{{ areActiveRoutes(['report.team', 'report.project']) }}" >
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reportes</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="{{ isActiveRoute('report.team') }}"><a href="{{ url('panel/report/team') }}" ><i class="fa fa-group"></i>Equipo</a></li>
                <li class="{{ isActiveRoute('report.project') }}"><a href="{{ url('panel/report/project') }}" ><i class="fa fa-stack-overflow"></i>Proyecto</a></li>
                </ul>
            </li>
            @endrole
         
          
            <li class="{{ isActiveRoute('manage-notification') }}">
                <a href="{{ url('panel/manage-notification') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Notificaciones al cliente(?)</span> </a>
            </li>
        </ul>

        </div>
    </nav>