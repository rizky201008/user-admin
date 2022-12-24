<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo e(route('login40')); ?>"><b>Login</b>Page</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php if($errors->has('error')): ?>
                <div class="text-danger text-center mb-3">
                    <?php echo e($errors->first('error')); ?>

                </div>
                <?php endif; ?>

                <form action="<?php echo e(route('login40.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <?php if($errors->has('email')): ?>
                        <div class="text-danger">
                            <?php echo e($errors->first('email')); ?>

                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo e(old('password')); ?>" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <?php if($errors->has('password')): ?>
                        <div class="text-danger">
                            <?php echo e($errors->first('password')); ?>

                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                </div>
                <p class="mb-0 text-center">
                    <a href="<?php echo e(route('register40')); ?>" class="text-center">Register a new membership</a>
                </p>
                <div class="alert alert-dark" role="alert">
                    <p class="p-0">Login :</p>
                    <p class="p-0">email = admin@gmail.com</p>
                    <p class="p-0">password = 123456</p>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\entho\Desktop\user-admin\resources\views/login.blade.php ENDPATH**/ ?>