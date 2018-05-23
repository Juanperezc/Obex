<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <center>
                            <img alt="image" class="img-profile" src="/storage/avatars/<?php echo e(Auth::user()->profile_img); ?>"></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold"><?php echo e(Auth::user()->name); ?></strong>
                                    </span>
                                    <span class="text-muted text-xs block">Art Director
                                        <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="<?php echo e(route('profile')); ?>">Perfil</a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('logout')); ?>">Salir</a>
                                </li>
                            </ul>
                        </center>
                    </div>

                    <div class="logo-element">
                        Obex
                    </div>
                </li>
                <li class="<?php echo e(isActiveRoute('main')); ?>">
                    <a href="<?php echo e(url('panel/')); ?>">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li
                    class="<?php echo e(areActiveRoutes(['manage-account.user-register', 'manage-account.user-management','manage-account.client-register','manage-account.client-management'])); ?>">
                    <a href="#">
                        <i class="fa fa-gears"></i>
                        <span class="nav-label">Gestionar Cuentas</span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li class="<?php echo e(isActiveRoute('manage-account.client-register')); ?>">
                            <a href="<?php echo e(url('panel/manage-account/client-register')); ?>">
                                <i class="fa fa-plus"></i>
                                Registrar Clientes
                            </a>
                        </li>
                        <li class="<?php echo e(isActiveRoute('manage-account.user-register')); ?>">
                            <a href="<?php echo e(url('panel/manage-account/user-register')); ?>">
                                <i class="fa fa-plus"></i>Registrar Usuarios</a>
                        </li>
                        <li class="<?php echo e(isActiveRoute('manage-account.client-management')); ?>">
                            <a href="<?php echo e(url('panel/manage-account/client-management')); ?>">
                                <i class="fa fa-exclamation-triangle"></i>Modificar o Eliminar Clientes
                            </a>
                        </li>
                        <li class="<?php echo e(isActiveRoute('manage-account.user-management')); ?>">
                            <a href="<?php echo e(url('panel/manage-account/user-management')); ?>">
                                <i class="fa fa-exclamation-triangle"></i>Modificar o Eliminar Usuarios</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
         
            <?php if (Auth::check() && Auth::user()->hasRole('admin|manager')): ?>
            <li class="<?php echo e(areActiveRoutes(['project.view','project.create','project.resources','project.modify'])); ?>">
                <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Proyectos</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="<?php echo e(isActiveRoute('project.view')); ?>"><a href="<?php echo e(url('panel/project/')); ?>" ><i class="fa fa-eye"></i>Ver Proyectos</a></li>
                <li class="<?php echo e(isActiveRoute('project.create')); ?>"><a href="<?php echo e(url('panel/project/create')); ?>"><i class="fa fa-plus"></i>Crear Proyecto</a></li>
                <li class="<?php echo e(isActiveRoute('project.resources')); ?>"><a href="<?php echo e(url('panel/project/resources')); ?>" ><i class="fa fa-stack-overflow"></i>Gestionar Recursos</a></li>
                <li class="<?php echo e(isActiveRoute('project.modify')); ?>"><a href="<?php echo e(url('panel/project/modify')); ?>"><i class="fa fa-exclamation-triangle"></i>Modificar o eliminar</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (Auth::check() && Auth::user()->hasRole('admin|manager')): ?>
            <li class="<?php echo e(areActiveRoutes(['team.view','team.create','team.modify'])); ?>">
                <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Equipos</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="<?php echo e(isActiveRoute('team.view')); ?>"><a href="<?php echo e(url('panel/team/view')); ?>" ><i class="fa fa-eye"></i>Ver Equipos</a></li>
                <li class="<?php echo e(isActiveRoute('team.create')); ?>"><a href="<?php echo e(url('panel/team/create')); ?>" ><i class="fa fa-plus"></i>Crear Equipo</a></li>
                <li class="<?php echo e(isActiveRoute('team.modify')); ?>"><a href="<?php echo e(url('panel/team/modify')); ?>"><i class="fa fa-exclamation-triangle"></i>Modificar o eliminar Equipo</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (Auth::check() && Auth::user()->hasRole('admin|manager')): ?>
            <li class="<?php echo e(areActiveRoutes(['report.team', 'report.project'])); ?>" >
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reportes</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="<?php echo e(isActiveRoute('report.team')); ?>"><a href="<?php echo e(url('panel/report/team')); ?>" ><i class="fa fa-group"></i>Equipo</a></li>
                <li class="<?php echo e(isActiveRoute('report.project')); ?>"><a href="<?php echo e(url('panel/report/project')); ?>" ><i class="fa fa-stack-overflow"></i>Proyecto</a></li>
                </ul>
            </li>
            <?php endif; ?>
         
          
            <li class="<?php echo e(isActiveRoute('manage-notification')); ?>">
                <a href="<?php echo e(url('panel/manage-notification')); ?>"><i class="fa fa-bullhorn"></i> <span class="nav-label">Notificaciones al cliente(?)</span> </a>
            </li>
        </ul>

        </div>
    </nav>