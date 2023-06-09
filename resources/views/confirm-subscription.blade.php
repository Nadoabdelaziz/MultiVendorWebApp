@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>{{ $allsettings->site_title }} - {{ __('Subscription Upgrade') }}</title>
@include('meta')
@include('style')
</head>
<body>
@include('header')
<section class="bg-position-center-top" style="background-color: #3a4a4e;">
      <div class="py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ __('Home') }}</a></li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ __('Subscription Upgrade') }}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 mb-0 text-white">{{ __('Subscription Upgrade') }}</h1>
        </div>
      </div>
      </div>
    </section>
<div class="faq-section section-padding subscribe-details" data-aos="fade-up" data-aos-delay="200">
		<div class="container py-5 mt-md-2 mb-2">
			<div class="row">
         <div class="col-sm-6 col-md-7 col-lg-7 subscribe-details">
            <div class="mb-3">
                <h4 class="mb-3">{{ __('Subscription Details') }}</h4>
                <div class="card-body">
                    <p><label>{{ __('Subscription Name') }} :</label> {{ $subscr['view']->subscr_name }}</p>
                    <p><label>{{ __('Price') }} :</label> {{ Helper::price_format($allsettings->site_currency_position,$subscr['view']->subscr_price,"symbol") }}</p>
                    <p><label>{{ __('Duration') }} :</label> {{ $subscr['view']->subscr_duration }}</p>
                    @if($subscr['view']->subscr_item_level == 'limited')
                    <p><label>{{ __('No of Items') }} :</label> {{ $subscr['view']->subscr_item }} {{ __('Items') }}</p>
                    @else
                    <p><label>{{ __('No of Items') }} :</label> {{ __('Unlimited') }}</p>
                    @endif
                    @if($subscr['view']->subscr_space_level == 'limited')
                    <p><label>{{ __('Available Space') }} :</label> {{ $subscr['view']->subscr_space }}{{ $subscr['view']->subscr_space_type }}</p>
                    @else
                    <p><label>{{ __('Available Space') }} :</label> {{ __('Unlimited') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-5">
            <div>
                <h4 class="mb-3">{{ __('Select Payment Method') }}
                </h4>
                <div class="card-body">
                    <form action="{{ route('confirm-subscription') }}" class="needs-validation" id="checkout_form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    @php $no = 1; @endphp
                        @foreach($get_payment as $payment)
                        <div class="lebel">
                           <input id="opt1-{{ $payment }}" name="payment_method" type="radio" class="auto-width" value="{{ $payment }}" @if($no == 1) checked @endif data-bvalidator="required">
                           <label for="opt1-{{ $payment }}" >{{ $payment }}</label>      
                        </div>
                        @if($payment == 'stripe')
                                <div class="row" id="ifYes" style="display:none;">
                                  <div class="col-md-12 mb-3">
                                        <div class="stripebox">
                                        <label for="card-element">{{ __('Credit or debit card') }}</label>
                                        <div id="card-element">
                                        </div>
                                        <div id="card-errors" role="alert"></div>
                                        </div>
                                    </div>    
                                </div>        
                                @endif
                                @php $no++; @endphp
                                @endforeach
                                <input type="hidden" name="website_url" value="{{ url('/') }}">
                                <input type="hidden" name="user_subscr_id" value="{{ $subscr['view']->subscr_id }}">
                                <input type="hidden" name="user_subscr_type" value="{{ $subscr['view']->subscr_name }}">
                                <input type="hidden" name="user_subscr_date" value="{{ $subscr['view']->subscr_duration }}">
                                <input type="hidden" name="user_subscr_item_level" value="{{ $subscr['view']->subscr_item_level }}">
                                <input type="hidden" name="user_subscr_item" value="{{ $subscr['view']->subscr_item }}">
                                <input type="hidden" name="user_subscr_download_item" value="{{ $subscr['view']->subscr_download_item }}">
                                <input type="hidden" name="user_subscr_space_level" value="{{ $subscr['view']->subscr_space_level }}">
                                <input type="hidden" name="user_subscr_space" value="{{ $subscr['view']->subscr_space }}">
                                <input type="hidden" name="user_subscr_space_type" value="{{ $subscr['view']->subscr_space_type }}">
                                <input type="hidden" name="token" class="token">
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                         <div class="mx-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
        </div>
      </div>
	</div>
@include('footer')
@include('script')
</body>
</html>
@else
@include('503')
@endif