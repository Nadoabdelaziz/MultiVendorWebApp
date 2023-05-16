<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <title><?php echo e($allsettings->site_title); ?> - <?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(__('Sales')); ?> <?php else: ?>
            <?php echo e(__('404 Not Found')); ?> <?php endif; ?></title>
        <?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body>
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($addition_settings->subscription_mode == 0): ?>
        <?php echo $__env->make('my-sale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
        <?php if(Auth::user()->user_type == 'vendor'): ?>
        <?php if(Auth::user()->user_subscr_date >= date('Y-m-d')): ?>
        <div class="page-title-overlap pt-4" style="background-color: #3a4a4e;">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i
                                        class="dwg-home"></i>Custom Domains</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Custom Domains</li>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 mb-0 text-white">Custom Domains</h1>
                </div>
            </div>
        </div>
        <div class="container mb-5 pb-3">
            <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
                <div class="row">
                    <aside class="col-lg-4">
                        <div class="d-block d-lg-none p-4">
                            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i
                                    class="dwg-menu mr-2"></i><?php echo e(__('Account menu')); ?></a>
                        </div>
                        <?php if(Auth::user()->id != 1): ?>
                        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </aside>
                    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                        <!-- <a class="btn btn-primary btn-sm" href="#"><i class="dwg-sign-out mr-2"></i>Create New
                            Domain</a> -->



                        <br><br>
                        <form method="POST" action="javascript:void(0);" id="login_form" class="needs-validation">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-fn">Domain URL <span class="required">*</span></label>
                                        <input id="domain_name" type="text" class="form-control" name="name"
                                            placeholder="<?php echo e(__('Enter domain name')); ?>" value="<?php echo e(old('name')); ?>"
                                            data-bvalidator="required" autocomplete="name" autofocus> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <button onclick="showrestofdata();" class="btn btn-primary mt-3 mt-sm-0"
                                        type="submit"><?php echo e(__('Add Domain')); ?></button>
                                </div>
                            </div>

                        </form>

                        <br>

                        <a href="<?php echo e(route('help')); ?>"> <span class="text-accent font-size-sm">- How To Add Custom
                                Domain ?</span></a>
                        <br>
                        <br>
                        <br>

                        <form id="info_show" style="display:none" method="POST" action="<?php echo e(route('register')); ?>"
                            id="login_form" class="needs-validation">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-fn">Name <span class="required">*</span></label>
                                        <input readonly id="domain_name_new" type="text" class="form-control"
                                            name="name" placeholder="<?php echo e(__('Enter domain name')); ?>"
                                            value="<?php echo e(old('name')); ?>" data-bvalidator="required" autocomplete="name"
                                            autofocus> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-email">Type<span class="required">*</span></label>
                                        <input readonly id="email" type="text" class="form-control" name="email"
                                            value="CNAME" autocomplete="email" data-bvalidator="email,required"
                                            readonly>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-pass">Value <span class="required">*</span></label>
                                        <div class="password-toggle">
                                            <input readonly id="password" class="form-control" name="password"
                                                value="<?php echo e(env('APP_URL')); ?>/shop/<?php echo e(Auth::user()->username); ?>" readonly>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <br>

                        <script>
                        function showrestofdata() {
                            var domain = document.getElementById("domain_name").value;
                            if (domain !== "") {
                                document.getElementById("info_show").style.display = "block";
                                document.getElementById("domain_name_new").value = domain;
                            }


                        }
                        </script>

                    </section>
                </div>
            </div>
        </div>
        <?php else: ?>
        <?php echo $__env->make('expired', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php else: ?>
        <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/custom-domain.blade.php ENDPATH**/ ?>