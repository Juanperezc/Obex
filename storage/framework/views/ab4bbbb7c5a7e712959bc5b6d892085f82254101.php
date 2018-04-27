<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Example user</strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('main')); ?>">
                <a href="<?php echo e(url('/')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?php echo e(areActiveRoutes(['manage-account.client', 'manage-account.user'])); ?>">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Gestionar Cuentas</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="<?php echo e(isActiveRoute('manage-account.client')); ?>">
                <a href="<?php echo e(url('/manage-account/client')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Registrar Clientes</span> </a>
            </li>
            </ul>
            </li>
            <li class="<?php echo e(isActiveRoute('manage-resource')); ?>">
                <a href="<?php echo e(url('/manage-resource')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Gestion de recursos</span> </a>
            </li>
            <li class="<?php echo e(areActiveRoutes(['report.team', 'report.project'])); ?>" >
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Reportes</span> </a>
                <ul class="nav nav-second-level collapse">
                <li class="<?php echo e(isActiveRoute('report.team')); ?>"><a href="<?php echo e(url('/report/team')); ?>" >Equipo</a></li>
                <li class="<?php echo e(isActiveRoute('report.project')); ?>"><a href="<?php echo e(url('/report/project')); ?>" >Proyecto</a></li></ul>
            </li>
         
          
            <li class="<?php echo e(isActiveRoute('manage-notification')); ?>">
                <a href="<?php echo e(url('/manage-notification')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Notificaciones al cliente(?)</span> </a>
            </li>
        </ul>

    </div>
</nav>
