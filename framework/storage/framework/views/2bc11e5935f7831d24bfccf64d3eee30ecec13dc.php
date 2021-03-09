<?php $__env->startSection('content'); ?>
<div class="wrapper" style="background:#000000">
        <!-- Login Page Start -->
        <div class="m-account-w" data-bg-img="assets/img/account/wrapper-bg.jpg">
            <div class="m-account">
                <div class="row no-gutters">

                    <div class="col-md-12 mx-auto">
                        <!-- Login Form Start -->
                        <div class="m-account--form-w">
                            <div class="m-account--form">
                                <!-- Logo Start -->
                                <div class="logo">
                                    <!--<img src="<?php echo e(asset('admin/img/logo1.png')); ?>" alt="ExtensioBuyer Admin">-->
                                    <h2>dealrated | Admin</h2>
                                </div>
                                <!-- Logo End -->

                                <form id='login-form-id' action="<?php echo e(route('admin.login')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <label class="m-account--title">Login</label>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-user"></i>
                                            </div>

                                            <input id="email" type="email" placeholder="Email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email"  required autocomplete="email" autofocus>
                                            <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                           <?php endif; ?>
                                        </div>
                                        <?php if(session()->has('userstatus')): ?>
                                        <label class="error">
                                            <?php echo e(session()->get('userstatus')); ?>

                                        </label>
                                       <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fas fa-key"></i>
                                            </div>

                                            <input placeholder="Password" id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"  name="password"  required autocomplete="current-password">

                                            <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="m-account--actions">
                                        <!-- <a href="#" class="btn-link">Forgot Password?</a> -->

                                        <button type="submit" class="btn btn-block btn-rounded btn-info">Login</button>
                                    </div>

                                    <!-- <div class="m-account--alt">
                                        <p><span>OR LOGIN WITH</span></p>

                                        <div class="btn-list">
                                            <a href="#" class="btn btn-rounded btn-warning">Facebook</a>
                                            <a href="#" class="btn btn-rounded btn-warning">Google</a>
                                        </div>
                                    </div> -->

                                    <div class="m-account--footer">
                                        <p>&copy; 2020 <?php echo Config::get('constants.copy_right'); ?></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Page End -->
    </div>
    <!-- Wrapper End -->
    <?php echo $__env->make('Admin::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/auth/login.blade.php ENDPATH**/ ?>