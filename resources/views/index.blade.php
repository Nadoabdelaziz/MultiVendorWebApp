@if($allsettings->maintenance_mode == 0)
<!DOCTYPE HTML>
<html lang="en">


    <head>
        <title>{{ __('Home') }} - {{ $allsettings->site_title }}</title>
        @include('meta')
        @include('style')
    </head>

    <body style="width: fit-content;margin-left: 8.5%;background-color:#293436">
        @include('header')
        <section class="bg-position-center-top">
            <div style="background: #323e42;margin: 15px 0px 15px 0px;" class="navbar navbar-expand ">
                <ul class="navbar-nav" style="">
                    <li class="nav-item dropdown d-none d-md-block">
                        <a style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="{{ url('/') }}">{{__('HOME')}}</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="{{ url('/register') }}">{{__('BECOME A SELLER')}}</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="{{ url('/') }}">{{__('PROTECT DOGS ACTION')}}</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="{{ url('/') }}">{{__('FEES')}}</a>
                    </li>
                    <li class="nav-item dropdown d-none d-md-block"><a
                            style="font-size: large;color: darkgray;font-family: cursive !important;"
                            class="nav-link dropdown-toggle" href="{{ url('/') }}">{{__('SUPPORTED PAYMENTS')}}</a>

                    </li>
                </ul>

            </div>
        </section>
        <section class="bg-position-center-top"
            style="height: 335px;background-image: url('{{ url('/') }}/public/d_images/index_39.png');">
            <div class="mb-lg-3 pb-4 pt-5">
            </div>
        </section>
        @if(in_array('home',$top_ads))
        <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="col-lg-12 mb-1" align="center">
                    @php echo html_entity_decode($addition_settings->top_ads); @endphp
                </div>
            </div>
        </section>
        @endif
        @if(count($featured['items']) != 0)
        <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
            <!-- Heading-->
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <!-- <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ __('Featured Files') }}</h2> -->
                <!-- <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="{{ URL::to('/') }}/featured-items">{{ __('Browse All Items') }}<i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div> -->
            </div>

            <div style="justify-content: center;background-size: cover;height: 110px;background-image: url('http://localhost/fickrr/public/d_images/index_41.png');"
                class="d-flex flex-wrap align-items-center"><a style="margin-top: -32px;color: white;"
                    class="dwg-arrow-left font-size-m ml-1" href="{{ URL::to('/language') }}/gr"></a>


                <span style=" margin-top: -25px;color: green;margin-left: 238px;margin-right: -7px;" class=""></span>
                <!-- <span style="margin-top: -32px;color: white;" class="dwg-arrow-right font-size-m ml-1"></span> -->

                <a style="margin-top: -32px;color: white;" class="dwg-arrow-right font-size-m ml-1"
                    href="{{ URL::to('/language') }}/en"></a>
            </div>

            <!-- Grid-->
            <div class="row flash-sale"
                style="    padding-top: 80px !important;
    padding: 25px;border-right-width: 2px;border-right-style: solid;border-left-style: solid;margin-left: auto;border-right-color: rgb(41, 52, 54);border-left-color: rgb(41, 52, 54);border-left-width: 13px;background: white;margin-right: auto;">
                <!-- Product-->
                @php $no = 1; @endphp
                @foreach($featured['items'] as $featured)
                @php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <!-- Product-->
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            @if(Auth::guest())
                            <a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>
                            @endif
                            @if (Auth::check())
                            @if($featured->user_id != Auth::user()->id)
                            <a class="btn-wishlist btn-sm"
                                href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i
                                    class="dwg-heart"></i></a>
                            @endif
                            @endif
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"><i class="dwg-eye"></i></a>
                                @php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                @if($featured->free_download == 0)
                                @if (Auth::check())
                                @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                @if(Auth::guest())
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/login') }}"><i class="dwg-download"></i></a>
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i
                                        class="dwg-download"></i></a>
                                @endif
                                @endif
                                @endif
                            </div><a class="product-thumb-overlay"
                                href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>
                            @if($featured->item_preview!='')
                            <img class="lazy" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @else
                            <img class="lazy" src="{{ url('/') }}/public/img/no-image.png"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="{{ URL::to('/shop') }}/item-type/{{ $featured->item_type }}">{{ str_replace('-',' ',$featured->item_type) }}</a>
                                </div>
                                <div class="star-rating">
                                    @if($count_rating == 0)
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 1)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 2)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 3)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 4)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 5)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    @endif
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">@if($addition_settings->item_name_limit
                                    !=
                                    0){{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
                                    @else {{ $featured->item_name }} @endif</a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}">
                                    <div class="blog-entry-author-ava">
                                        @if($featured->user_photo!='')
                                        <img class="lazy"
                                            src="{{ url('/') }}/public/storage/users/{{ $featured->user_photo }}"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @else
                                        <img class="lazy" src="{{ url('/') }}/public/img/no-user.png"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @endif
                                    </div>
                                    @if($addition_settings->author_name_limit !=
                                    0){{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
                                    @else {{ $featured->username }} @endif
                                    @if($addition_settings->subscription_mode == 1)
                                    @if($featured->user_document_verified == 1) <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> {{ __('verified') }}</span>@endif
                                    @endif
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    {{ date('d M Y',strtotime($featured->updated_item)) }}</div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                @if($featured->file_type == 'serial')
                                @php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                @endphp
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i>{{ $result_count }}<span
                                        class="font-size-xs ml-1">{{ __('Stock') }}</span>
                                </div>
                                @else
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i>{{ $featured->item_sold }}<span
                                        class="font-size-xs ml-1">{{ __('Sales') }}</span>
                                </div>
                                @endif
                                <div>
                                    @if($featured->free_download == 0)
                                    @if($featured->item_flash == 1)<del
                                        class="price-old">{{ Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol") }}</del>@endif
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ Helper::price_format($allsettings->site_currency_position,$price,"symbol") }}</span>
                                    @else
                                    <span class="price-badge rounded-sm py-1 px-2">{{ __('Free') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                @php $no++; @endphp
                @endforeach
            </div>
        </section>
        @endif
        <!-- @if(count($popular['items']) != 0) -->
        <!-- <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ __('Popular Items') }}</h2>
                <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="{{ URL::to('/') }}/popular-items">{{ __('Browse All Items') }}<i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
            </div>
            <div class="row pt-2 mx-n2">
                @php $no = 1; @endphp
                @foreach($popular['items'] as $featured)
                @php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            @if(Auth::guest())
                            <a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>
                            @endif
                            @if (Auth::check())
                            @if($featured->user_id != Auth::user()->id)
                            <a class="btn-wishlist btn-sm"
                                href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i
                                    class="dwg-heart"></i></a>
                            @endif
                            @endif
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"><i class="dwg-eye"></i></a>
                                @php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                @if($featured->free_download == 0)
                                @if (Auth::check())
                                @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                @if(Auth::guest())
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/login') }}"><i class="dwg-download"></i></a>
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i
                                        class="dwg-download"></i></a>
                                @endif
                                @endif
                                @endif
                            </div><a class="product-thumb-overlay"
                                href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>
                            @if($featured->item_preview!='')
                            <img class="lazy" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @else
                            <img class="lazy" src="{{ url('/') }}/public/img/no-image.png"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="{{ URL::to('/shop') }}/item-type/{{ $featured->item_type }}">{{ str_replace('-',' ',$featured->item_type) }}</a>
                                </div>
                                <div class="star-rating">
                                    @if($count_rating == 0)
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 1)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 2)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 3)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 4)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 5)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    @endif
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                    @if($addition_settings->item_name_limit != 0)
                                    {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
                                    @else
                                    {{ $featured->item_name }}
                                    @endif
                                </a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}">
                                    <div class="blog-entry-author-ava">
                                        @if($featured->user_photo!='')
                                        <img class="lazy"
                                            src="{{ url('/') }}/public/storage/users/{{ $featured->user_photo }}"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @else
                                        <img class="lazy" src="{{ url('/') }}/public/img/no-user.png"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @endif
                                    </div>
                                    @if($addition_settings->author_name_limit !=
                                    0){{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
                                    @else {{ $featured->username }} @endif
                                    @if($addition_settings->subscription_mode == 1)
                                    @if($featured->user_document_verified == 1) <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> {{ __('verified') }}</span>@endif
                                    @endif
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    {{ date('d M Y',strtotime($featured->updated_item)) }}</div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                @if($featured->file_type == 'serial')
                                @php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                @endphp
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i>{{ $result_count }}<span
                                        class="font-size-xs ml-1">{{ __('Stock') }}</span>
                                </div>
                                @else
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i>{{ $featured->item_sold }}<span
                                        class="font-size-xs ml-1">{{ __('Sales') }}</span>
                                </div>
                                @endif
                                <div>
                                    @if($featured->free_download == 0)
                                    @if($featured->item_flash == 1)<del
                                        class="price-old">{{ Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol") }}</del>@endif
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ Helper::price_format($allsettings->site_currency_position,$price,"symbol") }}</span>
                                    @else
                                    <span class="price-badge rounded-sm py-1 px-2">{{ __('Free') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php $no++; @endphp
                @endforeach
            </div>
        </section> -->
        <!-- @endif -->
        @if(count($free['items']) != 0)
        <section style="    margin-top: -4px;
    background: white;
    width: 1216px;
    margin-left: 28px;" class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
            <!-- Heading-->
            <!-- <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
                <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ __('Free Items') }}</h2>
                <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                    <a class="btn btn-outline-accent"
                        href="{{ URL::to('/') }}/free-items">{{ __('Browse All Items') }}<i
                            class="dwg-arrow-right font-size-ms ml-1"></i></a>
                </div>
            </div> -->
            <!-- Grid-->
            <div class="row pt-2 mx-n2">
                <!-- Product-->
                @php $no = 1; @endphp
                @foreach($free['items'] as $featured)
                @php
                $price = Helper::price_info($featured->item_flash,$featured->regular_price);
                $count_rating = Helper::count_rating($featured->ratings);
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <!-- Product-->
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            @if(Auth::guest())
                            <a class="btn-wishlist btn-sm" href="{{ url('/') }}/login"><i class="dwg-heart"></i></a>
                            @endif
                            @if (Auth::check())
                            @if($featured->user_id != Auth::user()->id)
                            <a class="btn-wishlist btn-sm"
                                href="{{ url('/item') }}/{{ base64_encode($featured->item_id) }}/favorite/{{ base64_encode($featured->item_liked) }}"><i
                                    class="dwg-heart"></i></a>
                            @endif
                            @endif
                            <div class="product-card-actions"><a
                                    class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"><i class="dwg-eye"></i></a>
                                @php
                                $checkif_purchased = Helper::if_purchased($featured->item_token);
                                @endphp
                                @if($checkif_purchased == 0)
                                @if($featured->free_download == 0)
                                @if (Auth::check())
                                @if(Auth::user()->id != 1 && $featured->user_id != Auth::user()->id)
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/add-to-cart') }}/{{ $featured->item_slug }}"><i
                                        class="dwg-cart"></i></a>
                                @endif
                                @else
                                @if(Auth::guest())
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/login') }}"><i class="dwg-download"></i></a>
                                @else
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2"
                                    href="{{ URL::to('/item') }}/download/{{ base64_encode($featured->item_token) }}"><i
                                        class="dwg-download"></i></a>
                                @endif
                                @endif
                                @endif
                            </div><a class="product-thumb-overlay"
                                href="{{ URL::to('/item') }}/{{ $featured->item_slug }}"></a>
                            @if($featured->item_preview!='')
                            <img class="lazy" src="{{ Helper::Image_Path($featured->item_preview,'no-image.png') }}"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @else
                            <img class="lazy" src="{{ url('/') }}/public/img/no-image.png"
                                alt="{{ $featured->item_name }}" width="300" height="200">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1"><a class="product-meta font-weight-medium"
                                        href="{{ URL::to('/shop') }}/item-type/{{ $featured->item_type }}">{{ str_replace('-',' ',$featured->item_type) }}</a>
                                </div>
                                <div class="star-rating">
                                    @if($count_rating == 0)
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 1)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 2)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 3)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 4)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star"></i>
                                    @endif
                                    @if($count_rating == 5)
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    <i class="sr-star dwg-star-filled active"></i>
                                    @endif
                                </div>
                            </div>
                            <h3 class="product-title font-size-sm mb-2"><a
                                    href="{{ URL::to('/item') }}/{{ $featured->item_slug }}">
                                    @if($addition_settings->item_name_limit != 0)
                                    {{ mb_substr($featured->item_name,0,$addition_settings->item_name_limit,'utf-8').'...' }}
                                    @else
                                    {{ $featured->item_name }}
                                    @endif
                                </a></h3>
                            <div class="card-footer d-flex align-items-center font-size-xs">
                                <a class="blog-entry-meta-link" href="{{ URL::to('/user') }}/{{ $featured->username }}">
                                    <div class="blog-entry-author-ava">
                                        @if($featured->user_photo!='')
                                        <img class="lazy"
                                            src="{{ url('/') }}/public/storage/users/{{ $featured->user_photo }}"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @else
                                        <img class="lazy" src="{{ url('/') }}/public/img/no-user.png"
                                            alt="{{ $featured->username }}" width="26" height="26">
                                        @endif
                                    </div>
                                    @if($addition_settings->author_name_limit != 0)
                                    {{ mb_substr($featured->username,0,$addition_settings->author_name_limit,'utf-8') }}
                                    @else
                                    {{ $featured->username }}
                                    @endif
                                    @if($addition_settings->subscription_mode == 1)
                                    @if($featured->user_document_verified == 1) <span class="badges-success"><i
                                            class="dwg-check-circle danger"></i> {{ __('verified') }}</span>@endif
                                    @endif
                                </a>
                                <div class="ml-auto text-nowrap"><i class="dwg-time"></i>
                                    {{ date('d M Y',strtotime($featured->updated_item)) }}</div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                @if($featured->file_type == 'serial')
                                @php
                                if($featured->item_delimiter == 'comma')
                                {
                                $result_count = substr_count($featured->item_serials_list, ",");
                                }
                                else
                                {
                                $result_count = substr_count($featured->item_serials_list, "\n");
                                }
                                @endphp
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-cart text-muted mr-1"></i>{{ $result_count }}<span
                                        class="font-size-xs ml-1">{{ __('Stock') }}</span>
                                </div>
                                @else
                                <div class="font-size-sm mr-2"><i
                                        class="dwg-download text-muted mr-1"></i>{{ $featured->item_sold }}<span
                                        class="font-size-xs ml-1">{{ __('Sales') }}</span>
                                </div>
                                @endif
                                <div>
                                    @if($featured->free_download == 0)
                                    @if($featured->item_flash == 1)<del
                                        class="price-old">{{ Helper::price_format($allsettings->site_currency_position,$featured->regular_price,"symbol") }}</del>@endif
                                    <span
                                        class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ Helper::price_format($allsettings->site_currency_position,$price,"symbol") }}</span>
                                    @else
                                    <span class="price-badge rounded-sm py-1 px-2">{{ __('Free') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product-->
                @php $no++; @endphp
                @endforeach
            </div>
        </section>
        @endif
        @if(count($newest['items']) != 0)
        <section class="container pb-4 pb-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4" style="
    background-size: cover;
    margin-left: 9px;
    height: 110px;
    background-image: url(http://localhost/fickrr/public/d_images/index_48.png);
    margin-top: -5px;
"> </div>

        </section>
        @endif

        @if(in_array('home',$bottom_ads))
        <section class="container pt-2" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="col-lg-12 mb-3" align="center">
                    @php echo html_entity_decode($addition_settings->bottom_ads); @endphp
                </div>
            </div>
        </section>
        @endif
        @include('footer')
        @include('script')
    </body>

</html>
@else
@include('503')
@endif