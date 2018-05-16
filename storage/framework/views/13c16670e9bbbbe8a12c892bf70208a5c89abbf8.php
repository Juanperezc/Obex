<?php $__env->startSection('content'); ?>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
<img class="logo-login"src="/images/logo.png"></img>

            </div>
            <h3>Bienvenido a Obex</h3>
            <p>
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <form class="m-t" role="form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" name="email" class="form-control" placeholder="Correo" value="<?php echo e(old('email')); ?>" required="">
                    <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <div class="input-group">
                   <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" required="">
                   <span class="input-group-btn"><button-password></button-password></span></div>
                    <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                <a href="#">¿Olvidaste tu contraseña?</a>
                <br>
                <a href="#">Contacta con el administrador</a>
            </form>
            
        </div>
  


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>