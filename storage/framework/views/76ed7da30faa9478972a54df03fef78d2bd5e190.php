<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(in_array('settings',$avilable)): ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

       
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo e(__('Font')); ?> & <?php echo e(__('Color Settings')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.font-color-settings')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Site Theme Color')); ?> <span class="require">*</span></label>
                                                <input id="site_theme_color" name="site_theme_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_theme_color); ?>" data-bvalidator="required"> <small>(<?php echo e(__('example color code')); ?> : #666000 )</small>
                                            </div>
                                            
                                           
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Site Button Color')); ?> <span class="require">*</span></label>
                                                <input id="site_button_color" name="site_button_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_button_color); ?>" data-bvalidator="required"> <small>(<?php echo e(__('example color code')); ?> : #666000 )</small>
                                            </div>
                                             
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1"><?php echo e(__('Custom Css Code')); ?></label>
                                            <textarea name="site_custom_css" id="site_custom_css" rows="6" class="form-control noscroll_textarea"><?php echo e($additional->site_custom_css); ?></textarea></div>
                                            <small>Example CSS Code: <code><br/>body { background:#FFFFFF; }<br/>.class { color:#454998; }<br/>#id { font-size:20px; }</code></small> 
                                            
                                                
                                                
                                        
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                             
                            
                                            
                                           
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Header & Footer BgColor')); ?> <span class="require">*</span></label>
                                                <input id="site_header_color" name="site_header_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_header_color); ?>" data-bvalidator="required"> <small>(<?php echo e(__('example color code')); ?> : #666000 )</small>
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Site Button Hover Color')); ?> <span class="require">*</span></label>
                                                <input id="site_button_hover" name="site_button_hover" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_button_hover); ?>" data-bvalidator="required"> <small>(<?php echo e(__('example color code')); ?> : #666000 )</small>
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Copyright BgColor')); ?> <span class="require">*</span></label>
                                                <input id="site_footer_color" name="site_footer_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_footer_color); ?>" data-bvalidator="required"> <small>(<?php echo e(__('example color code')); ?> : #666000 )</small>
                                            </div>
                                             
                                              <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"><?php echo e(__('Theme Font Family')); ?></label>
                                                
                                                <input id="theme_font_family" type="text" class="form-control noscroll_textarea" data-bvalidator="required" name="theme_font_family" value="<?php echo e($additional->theme_font_family); ?>">
                                                <span id="paragraph7" <?php if($additional->theme_font_family != ''): ?> style="font-family: '<?php echo e(str_replace("+"," ",$additional->theme_font_family)); ?>';" <?php endif; ?>>This is the preview of the font selected</span>
                                            </div>
                                             
                                                
                                                
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             
                             
                             
                             
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> <?php echo e(__('Submit')); ?>

                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?>

                                                        </button>
                                                    </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> 
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\fickrr\resources\views/admin/font-color-settings.blade.php ENDPATH**/ ?>