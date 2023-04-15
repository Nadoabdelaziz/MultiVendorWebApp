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

        <div class="page-title-overlap pt-4"
            style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i
                                        class="dwg-home"></i>Help</a></li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Help</li>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                    <h1 class="h3 mb-0 text-white">Help</h1>
                </div>
            </div>
        </div>
        <div class="container mb-5 pb-3">
            <div style="padding: 41px;" class="bg-light box-shadow-lg rounded-lg overflow-hidden">
                <div class="row">
                    <section class="pt-lg-4 pb-4 mb-3">
                        <div class="justify-center flex">
                            <div class="z-3 relative w-full lg:max-w-160">
                                <div class="mx-1">
                                    <div class="article intercom-force-break">
                                        <div class="jsx-437021647e349857 ">
                                            <div class="jsx-437021647e349857 ">
                                                <article dir="ltr" class="jsx-437021647e349857">
                                                    <div
                                                        class="intercom-interblocks-heading intercom-interblocks-align-left">
                                                        <h1 id="h_5c2ace898a">How to connect your domain to OwnStore ?
                                                        </h1>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Head to the <a href="<?php echo e(env('APP_URL')); ?>/custom-domain"
                                                                rel="nofollow noopener noreferrer"
                                                                target="_blank">custom domains page</a> on your
                                                            dashboard, then click "Add Personal Domain".</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/606964993/8c1e4b17dc25d720a629dde6/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/606964993/8c1e4b17dc25d720a629dde6/image.png"
                                                                width="3456" height="1816"></a>
                                                    </div>
                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Write the domain that you want to connect, such as
                                                            OwnStore.com
                                                            and click Add. </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p><b>N.B.: in this tutorial, OwnStore.com is an example of a
                                                                domain that will be connected to OwnStore, you must
                                                                always
                                                                replace it with your actual domain (e.g.
                                                                MyDomain.com).</b></p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/606965131/fbf039619cb0c39f4256b123/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/606965131/fbf039619cb0c39f4256b123/image.png"
                                                                width="3456" height="1818"></a>
                                                    </div>

                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Once done, you'll be prompted with some records to add to
                                                            your current domain Registrar.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/656731717/3df6b55c00923d88a9711e24/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/656731717/3df6b55c00923d88a9711e24/image.png"
                                                                width="3456" height="1816"></a>
                                                    </div>

                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-heading intercom-interblocks-align-left">
                                                        <h1 id="h_ac52fce4c8">How to add the DNS records</h1>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>We'll provide an example using Cloudflare, a popular domain
                                                            registrar and CDN.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>We suggest you first <a
                                                                href="https://developers.cloudflare.com/registrar/get-started/transfer-domain-to-cloudflare/"
                                                                rel="nofollow noopener noreferrer"
                                                                target="_blank">transfer your domain to Cloudflare</a>
                                                            and then connect it to OwnStore, in order to receive the
                                                            maximum support and protection for it.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p><b>If you do not want to or can't transfer your domain to
                                                                Cloudflare</b>, you might need to connect a subdomain
                                                            (like store.YourDomain.com) to be able to add a DNS record
                                                            for it.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>When you are on your Cloudflare dashboard, go to the DNS
                                                            configuration.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/606966555/df6505c20f4ec1a4f95f27d5/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/606966555/df6505c20f4ec1a4f95f27d5/image.png"
                                                                width="3456" height="1818"></a>
                                                    </div>

                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Add the record that you can see on OwnStore.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-subheading intercom-interblocks-align-left">
                                                        <h2 id="h_fd14fcfcbf">CNAME record</h2>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Be sure to configure it with a <b>grey cloud, DNS only</b>,
                                                            otherwise you might experience performance issues when using
                                                            OwnStore.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/656732434/30e11e2b8635faa30c151175/Screenshot+2023-01-21+at+01.23.49.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/656732434/30e11e2b8635faa30c151175/Screenshot+2023-01-21+at+01.23.49.png"
                                                                width="2336" height="1302"></a>
                                                    </div>

                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-subheading intercom-interblocks-align-left">
                                                        <h2 id="h_c8a45a25a8">Done</h2>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>You should now have one new DNS record configured for your
                                                            domain.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/656732593/57a3eb23fc7f8e4624a9236e/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/656732593/57a3eb23fc7f8e4624a9236e/image.png"
                                                                width="2334" height="760"></a>
                                                    </div>

                                                    <br>
                                                    <div
                                                        class="intercom-interblocks-heading intercom-interblocks-align-left">
                                                        <h1 id="h_72c96b16e3">What happens next</h1>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Now, you only have to wait. Within 24 hours the DNS record
                                                            should propagate, and you will be able to access OwnStore
                                                            from
                                                            the domain you have just configured.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p>Your robots.txt will be accessible at /robots.txt and it
                                                            should be indexed within the next 72 hours, depending on
                                                            Google bots.</p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-paragraph no-margin intercom-interblocks-align-left">
                                                        <p> </p>
                                                    </div>
                                                    <div
                                                        class="intercom-interblocks-image intercom-interblocks-align-left">
                                                        <a href="https://downloads.intercomcdn.com/i/o/606969117/7e5dbdc4136b44a5606846ec/image.png"
                                                            target="_blank" rel="noreferrer nofollow noopener"><img
                                                                src="https://downloads.intercomcdn.com/i/o/606969117/7e5dbdc4136b44a5606846ec/image.png"
                                                                width="2604" height="754"></a>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/help.blade.php ENDPATH**/ ?>