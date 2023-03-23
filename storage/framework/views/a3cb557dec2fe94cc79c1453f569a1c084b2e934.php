<div class="page-title-overlap pt-4" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo e(URL::to('/')); ?>"><i class="dwg-home"></i><?php echo e(__('Sales')); ?></a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo e(__('Sales')); ?></li>
              </li>
             </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white"><?php echo e(__('Sales')); ?></h1>
        </div>
      </div>
    </div>
<div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <aside class="col-lg-4">
            <div class="d-block d-lg-none p-4">
            <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i><?php echo e(__('Account menu')); ?></a></div>
            <?php if(Auth::user()->id != 1): ?>
            <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          </aside>
          <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
              <h2 class="h3 py-2 text-center text-sm-left"><?php echo e(__('Sales')); ?></h2>
              <div class="row mx-n2 pt-2">
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('total sales')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$total_sale,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Purchases')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$purchase_sale,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Credited')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$credit_amount,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Withdraw')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,$drawal_amount,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Referral Commission')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Helper::price_format($allsettings->site_currency_position,Auth::user()->referral_amount,"symbol")); ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 px-2 mb-4">
                  <div class="bg-secondary h-100 rounded-lg p-4 text-center">
                    <h3 class="font-size-sm text-muted"><?php echo e(__('Total Referrals')); ?></h3>
                    <p class="h2 mb-2"><?php echo e(Auth::user()->referral_count); ?></p>
                  </div>
                </div>
              </div>
              <div class="row mx-n2">
                <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Order ID')); ?></th>
                                        <th><?php echo e(__('Payment Type')); ?></th>
                                        <th><?php echo e(__('Price')); ?></th>
                                        <th><?php echo e(__('Earnings')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="listShow">
                                <?php $__currentLoopData = $orderData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="prod-item">
                                        <td><?php echo e(date("d M Y", strtotime($item->payment_date))); ?></td>
                                        <td class="author"><?php echo e($item->purchase_token); ?></td>
                                        <td class="type">
                                            <?php echo e($item->payment_type); ?>

                                        </td>
                                        <td><?php echo e(Helper::price_format($allsettings->site_currency_position,$item->total,"symbol")); ?></td>
                                        <td class="earning theme-color"><?php echo e(Helper::price_format($allsettings->site_currency_position,$item->vendor_amount,"symbol")); ?></td>
                                        <td>
                                            <a href="<?php echo e(URL::to('/sales')); ?>/<?php echo e($item->purchase_token); ?>" class="btn btn-success btn-sm"><?php echo e(__('view')); ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                               </tbody>
                            </table>
                            <div class="pagination-area">
                           <div class="turn-page" id="itempager"></div>
                        </div>
                       </div>
                    </div>
               </div>
            </div>
          </section>
        </div>
      </div>
    </div><?php /**PATH C:\xampp\htdocs\fickrr\resources\views/my-sale.blade.php ENDPATH**/ ?>