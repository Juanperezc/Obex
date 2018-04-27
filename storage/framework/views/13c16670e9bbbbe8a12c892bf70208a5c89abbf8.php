<?php $__env->startSection('content'); ?>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Bienvenido a Obex</h3>
            <p>lorem ipsum lorem array_intersect_assoc
            Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required="">
                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Olvidaste tu contraseña? pues te jodes</small></a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 © 2014</small> </p>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>