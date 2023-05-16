@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <title>{{ $allsettings->site_title }} - @if(Auth::user()->user_type == 'vendor') {{ __('Sales') }} @else
            {{ __('404 Not Found') }} @endif</title>
        @include('meta')
        @include('style')
    </head>

    <body>
        @include('header')
        @if($addition_settings->subscription_mode == 0)
        @include('my-sale')
        @else
        @if(Auth::user()->user_type == 'vendor')
        @if(Auth::user()->user_subscr_date >= date('Y-m-d'))
        <div class="page-title-overlap pt-4" style="background-color: #3a4a4e;">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="{{ URL::to('/') }}"><i
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
                                    class="dwg-menu mr-2"></i>{{ __('Account menu') }}</a>
                        </div>
                        @if(Auth::user()->id != 1)
                        @include('dashboard-menu')
                        @endif
                    </aside>
                    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                        <!-- <a class="btn btn-primary btn-sm" href="#"><i class="dwg-sign-out mr-2"></i>Create New
                            Domain</a> -->



                        <br><br>
                        <form method="POST" action="javascript:void(0);" id="login_form" class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-fn">Domain URL <span class="required">*</span></label>
                                        <input id="domain_name" type="text" class="form-control" name="name"
                                            placeholder="{{ __('Enter domain name') }}" value="{{ old('name') }}"
                                            data-bvalidator="required" autocomplete="name" autofocus> @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <button onclick="showrestofdata();" class="btn btn-primary mt-3 mt-sm-0"
                                        type="submit">{{ __('Add Domain') }}</button>
                                </div>
                            </div>

                        </form>

                        <br>

                        <a href="{{route('help')}}"> <span class="text-accent font-size-sm">- How To Add Custom
                                Domain ?</span></a>
                        <br>
                        <br>
                        <br>

                        <form id="info_show" style="display:none" method="POST" action="{{ route('register') }}"
                            id="login_form" class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-fn">Name <span class="required">*</span></label>
                                        <input readonly id="domain_name_new" type="text" class="form-control"
                                            name="name" placeholder="{{ __('Enter domain name') }}"
                                            value="{{ old('name') }}" data-bvalidator="required" autocomplete="name"
                                            autofocus> @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-email">Type<span class="required">*</span></label>
                                        <input readonly id="email" type="text" class="form-control" name="email"
                                            value="CNAME" autocomplete="email" data-bvalidator="email,required"
                                            readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="account-pass">Value <span class="required">*</span></label>
                                        <div class="password-toggle">
                                            <input readonly id="password" class="form-control" name="password"
                                                value="{{env('APP_URL')}}/shop/{{ Auth::user()->username }}" readonly>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
        @else
        @include('expired')
        @endif
        @else
        @include('not-found')
        @endif
        @endif
        @include('footer')
        @include('script')
    </body>

</html>
@else
@include('503')
@endif