<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE HTML>
<html lang="en">


    <head>
        <title><?php echo e(__('Home')); ?> - <?php echo e($allsettings->site_title); ?></title>
        <?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body style="width: fit-content;margin-left: 8.5%;background-color:#293436">
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="bg-position-center-top">
            <div style="background: #323e42;margin: 15px 0px 15px 0px;" class="navbar navbar-expand ">
                <ul class="navbar-nav" style="">
                    <li class="nav-item dropdown d-none d-md-block">
                        <a style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="<?php echo e(url('/')); ?>">HOME</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="<?php echo e(url('/register')); ?>">BECOME
                            A SELLER</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="<?php echo e(url('/')); ?>">PROTECT
                            DOGS ACTION</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="<?php echo e(url('/')); ?>">FEES</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="<?php echo e(url('/')); ?>">SUPPORTED PAYMENTS</a>

                    </li>
                </ul>

            </div>
        </section>
        <section class="bg-position-center-top"
            style="height: 335px;background-image: url('<?php echo e(url('/')); ?>/public/d_images/index_39.png');">
            <div class="mb-lg-3 pb-4 pt-5">
            </div>
        </section>
        <?php if(in_array('home',$top_ads)): ?>
        <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="col-lg-12 mb-1" align="center">
                    <?php echo html_entity_decode($addition_settings->top_ads); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php if(count($featured['items']) != 0): ?>
        <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
            <!-- Heading-->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(__('Featured Files')); ?></h2>
                <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="<?php echo e(URL::to('/')); ?>/featured-items"><?php echo e(__('Browse All Items')); ?><i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
            </div>

            <div style="    background-size: cover;
height: 110px;background-image: url('http://localhost/fickrr/public/d_images/index_41.png');"
                class="d-flex flex-wrap justify-content-between align-items-center">
            </div>

            <!-- Grid-->
            <div class="row flash-sale"
                style="    padding-top: 80px !important;
    padding: 25px;border-right-width: 2px;border-right-style: solid;border-left-style: solid;margin-left: auto;border-right-color: rgb(41, 52, 54);border-left-color: rgb(41, 52, 54);border-left-width: 13px;background: white;margin-right: auto;">
                <!-- Product-->
                <?php $no = 1; ?>
                <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <!-- Product-->
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <?php if(Auth::guest()): ?>
                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/')); ?>/login"><i class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <?php if($featured->user_id != Auth::user()->id): ?>
                            <a class="btn-wishlist btn-sm"
                                href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i
                                    class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-eye"></i></a>
                                <?php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                <?php if($featured->free_download == 0): ?>
                                <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if(Auth::guest()): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-download"></i></a>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i
                                        class="dwg-download"></i></a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div><a class="product-thumb-overlay"
                                href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>
                            <?php if($featured->item_preview!=''): ?>
                            <img class="lazy" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php else: ?>
                            <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-image.png"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a>
                                </div>
                                <div class="star-rating">
                                    <?php if($count_rating == 0): ?>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 1): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 2): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 3): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 4): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 5): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><?php if($addition_settings->item_name_limit
                                    !=
                                    0): ?><?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

                                    <?php else: ?> <?php echo e($featured->item_name); ?> <?php endif; ?></a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>">
                                    <div class="blog-entry-author-ava">
                                        <?php if($featured->user_photo!=''): ?>
                                        <img class="lazy"
                                            src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($featured->user_photo); ?>"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php else: ?>
                                        <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-user.png"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php endif; ?>
                                    </div>
                                    <?php if($addition_settings->author_name_limit !=
                                    0): ?><?php echo e(mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

                                    <?php else: ?> <?php echo e($featured->username); ?> <?php endif; ?>
                                    <?php if($addition_settings->subscription_mode == 1): ?>
                                    <?php if($featured->user_document_verified == 1): ?> <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> <?php echo e(__('verified')); ?></span><?php endif; ?>
                                    <?php endif; ?>
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    <?php echo e(date('d M Y',strtotime($featured->updated_item))); ?></div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <?php if($featured->file_type == 'serial'): ?>
                                <?php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i><?php echo e($result_count); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Stock')); ?></span>
                                </div>
                                <?php else: ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Sales')); ?></span>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <?php if($featured->free_download == 0): ?>
                                    <?php if($featured->item_flash == 1): ?><del
                                        class="price-old"><?php echo e(Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol")); ?></del><?php endif; ?>
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span>
                                    <?php else: ?>
                                    <span class="price-badge rounded-sm py-1 px-2"><?php echo e(__('Free')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <?php $no++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <?php endif; ?>
        <!-- <?php if(count($popular['items']) != 0): ?> -->
        <!-- <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(__('Popular Items')); ?></h2>
                <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="<?php echo e(URL::to('/')); ?>/popular-items"><?php echo e(__('Browse All Items')); ?><i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
            </div>
            <div class="row pt-2 mx-n2">
                <?php $no = 1; ?>
                <?php $__currentLoopData = $popular['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <?php if(Auth::guest()): ?>
                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/')); ?>/login"><i class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <?php if($featured->user_id != Auth::user()->id): ?>
                            <a class="btn-wishlist btn-sm"
                                href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i
                                    class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-eye"></i></a>
                                <?php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                <?php if($featured->free_download == 0): ?>
                                <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if(Auth::guest()): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-download"></i></a>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i
                                        class="dwg-download"></i></a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div><a class="product-thumb-overlay"
                                href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>
                            <?php if($featured->item_preview!=''): ?>
                            <img class="lazy" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php else: ?>
                            <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-image.png"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a>
                                </div>
                                <div class="star-rating">
                                    <?php if($count_rating == 0): ?>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 1): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 2): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 3): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 4): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 5): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                    <?php if($addition_settings->item_name_limit != 0): ?>
                                    <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

                                    <?php else: ?>
                                    <?php echo e($featured->item_name); ?>

                                    <?php endif; ?>
                                </a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>">
                                    <div class="blog-entry-author-ava">
                                        <?php if($featured->user_photo!=''): ?>
                                        <img class="lazy"
                                            src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($featured->user_photo); ?>"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php else: ?>
                                        <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-user.png"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php endif; ?>
                                    </div>
                                    <?php if($addition_settings->author_name_limit !=
                                    0): ?><?php echo e(mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

                                    <?php else: ?> <?php echo e($featured->username); ?> <?php endif; ?>
                                    <?php if($addition_settings->subscription_mode == 1): ?>
                                    <?php if($featured->user_document_verified == 1): ?> <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> <?php echo e(__('verified')); ?></span><?php endif; ?>
                                    <?php endif; ?>
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    <?php echo e(date('d M Y',strtotime($featured->updated_item))); ?></div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <?php if($featured->file_type == 'serial'): ?>
                                <?php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i><?php echo e($result_count); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Stock')); ?></span>
                                </div>
                                <?php else: ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Sales')); ?></span>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <?php if($featured->free_download == 0): ?>
                                    <?php if($featured->item_flash == 1): ?><del
                                        class="price-old"><?php echo e(Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol")); ?></del><?php endif; ?>
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span>
                                    <?php else: ?>
                                    <span class="price-badge rounded-sm py-1 px-2"><?php echo e(__('Free')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $no++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section> -->
        <!-- <?php endif; ?> -->
        <?php if(count($free['items']) != 0): ?>
        <section style="    margin-top: -4px;
    background: white;
    width: 1216px;
    margin-left: 28px;" class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
            <!-- Heading-->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(__('Free Items')); ?></h2>
                <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="<?php echo e(URL::to('/')); ?>/free-items"><?php echo e(__('Browse All Items')); ?><i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
            </div>
            <!-- Grid-->
            <div class="row pt-2 mx-n2">
                <!-- Product-->
                <?php $no = 1; ?>
                <?php $__currentLoopData = $free['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <!-- Product-->
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <?php if(Auth::guest()): ?>
                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/')); ?>/login"><i class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <?php if($featured->user_id != Auth::user()->id): ?>
                            <a class="btn-wishlist btn-sm"
                                href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($featured->item_id)); ?>/favorite/<?php echo e(base64_encode($featured->item_liked)); ?>"><i
                                    class="dwg-heart"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"><i class="dwg-eye"></i></a>
                                <?php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                ?>
                                <?php if($checkif_purchased == 0): ?>
                                <?php if($featured->free_download == 0): ?>
                                <?php if(Auth::check()): ?>
                                <?php if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/add-to-cart')); ?>/<?php echo e($featured->item_slug); ?>"><i
                                        class="dwg-cart"></i></a>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if(Auth::guest()): ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/login')); ?>"><i class="dwg-download"></i></a>
                                <?php else: ?>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="<?php echo e(URL::to('/item')); ?>/download/<?php echo e(base64_encode($featured->item_token)); ?>"><i
                                        class="dwg-download"></i></a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div><a class="product-thumb-overlay"
                                href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>"></a>
                            <?php if($featured->item_preview!=''): ?>
                            <img class="lazy" src="<?php echo e(Helper::Image_Path($featured->item_preview,'no-image.png')); ?>"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php else: ?>
                            <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-image.png"
                                alt="<?php echo e($featured->item_name); ?>" width="300" height="200">
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($featured->item_type); ?>"><?php echo e(str_replace('-',' ',$featured->item_type)); ?></a>
                                </div>
                                <div class="star-rating">
                                    <?php if($count_rating == 0): ?>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 1): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 2): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 3): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 4): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <?php endif; ?>
                                    <?php if($count_rating == 5): ?>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($featured->item_slug); ?>">
                                    <?php if($addition_settings->item_name_limit != 0): ?>
                                    <?php echo e(mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...'); ?>

                                    <?php else: ?>
                                    <?php echo e($featured->item_name); ?>

                                    <?php endif; ?>
                                </a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="<?php echo e(URL::to('/user')); ?>/<?php echo e($featured->username); ?>">
                                    <div class="blog-entry-author-ava">
                                        <?php if($featured->user_photo!=''): ?>
                                        <img class="lazy"
                                            src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($featured->user_photo); ?>"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php else: ?>
                                        <img class="lazy" src="<?php echo e(url('/')); ?>/public/img/no-user.png"
                                            alt="<?php echo e($featured->username); ?>" width="26" height="26">
                                        <?php endif; ?>
                                    </div>
                                    <?php if($addition_settings->author_name_limit != 0): ?>
                                    <?php echo e(mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8')); ?>

                                    <?php else: ?>
                                    <?php echo e($featured->username); ?>

                                    <?php endif; ?>
                                    <?php if($addition_settings->subscription_mode == 1): ?>
                                    <?php if($featured->user_document_verified == 1): ?> <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> <?php echo e(__('verified')); ?></span><?php endif; ?>
                                    <?php endif; ?>
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    <?php echo e(date('d M Y',strtotime($featured->updated_item))); ?></div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <?php if($featured->file_type == 'serial'): ?>
                                <?php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i><?php echo e($result_count); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Stock')); ?></span>
                                </div>
                                <?php else: ?>
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i><?php echo e($featured->item_sold); ?><span
                                        class="font-size-xs ml-1"><?php echo e(__('Sales')); ?></span>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <?php if($featured->free_download == 0): ?>
                                    <?php if($featured->item_flash == 1): ?><del
                                        class="price-old"><?php echo e(Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol")); ?></del><?php endif; ?>
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$price,"symbol")); ?></span>
                                    <?php else: ?>
                                    <span class="price-badge rounded-sm py-1 px-2"><?php echo e(__('Free')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                <?php $no++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <?php endif; ?>
        <?php if(count($newest['items']) != 0): ?>
        <section class="container pb-4 pb-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4" style="
    background-size: cover;
    margin-left: 9px;
    height: 110px;
    background-image: url(http://localhost/fickrr/public/d_images/index_48.png);
    margin-top: -5px;
"> </div>

        </section>
        <?php endif; ?>

        <?php if(in_array('home',$bottom_ads)): ?>
        <section class="container pt-2" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="col-lg-12 mb-3" align="center">
                    <?php echo html_entity_decode($addition_settings->bottom_ads); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/index.blade.php ENDPATH**/ ?>