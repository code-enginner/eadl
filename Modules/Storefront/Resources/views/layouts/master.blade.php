<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public-storefront/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public-storefront/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public-storefront/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public-storefront/images/icons/site.webmanifest') }}">
    {{--    <link rel="mask-icon" href="{{ asset('public-storefront/images/icons/safari-pinned-tab.svg') }}" color="#666666">--}}
    <link rel="shortcut icon" href="{{ asset('public-storefront/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    {{--    <meta name="msapplication-config" content="{{ asset('public-storefront/images/icons/browserconfig.xml') }}">--}}
    <meta name="theme-color" content="#ffffff">
    
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/bootstrap-rtl.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/fonts/IranSans/Webfonts/style.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/fonts/IRANYekan/Webfonts/style.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/fonts/MaterialDesign-Webfont-master/css/materialdesignicons.css') }}">--}}
    
    {{--        <link rel="stylesheet" href="{{ asset('css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">--}}
    
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/animate.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/owl-carousel/owl.carousel.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/magnific-popup/magnific-popup.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/jquery.countdown.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/plugins/aos/aos.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/style.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/skin-them-2.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/assets/theme-2.css') }}">--}}
    
    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/fonts/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public-storefront/css/custom-style.css') }}">
</head>
<body>
@yield('content')

<div class="page-wrapper">
    <header class="header header-2 header-intro-clearance">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <p>کالکشن های جدید به زودی در دسترس قرا می گیرند</p><a href="#">&nbsp;مطالعه بیشتر ...</a>
                </div><!-- End .header-left -->
                
                <div class="header-right">
                    
                    <ul class="top-menu">
                        <li>
                            <a href="#">لینک ها</a>
                            <ul>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">تومان</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">دلار</a></li>
                                                <li><a href="#">تومان</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div>
                                </li>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">فارسی</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">انگلیسی</a></li>
                                                <li><a href="#">فرانسوی</a></li>
                                                <li><a href="#">ترکی استانبولی</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div><!-- End .header-dropdown -->
                                </li>
                                <li><a href="#signin-modal" data-toggle="modal">ورود / ثبت نام</a></li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            
            </div><!-- End .container -->
        </div><!-- End .header-top -->
        
        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">فهرست</span>
                        <i class="icon-bars"></i>
                    </button>
                    
                    <a href="index-1.html" class="logo">
                        <img src="{{ asset('public-storefront/images/demos/demo-2/logo.png') }}" alt="Molla Logo" width="105" height="25">
                    </a>
                </div><!-- End .header-left -->
                
                <div class="header-center">
                    <div
                            class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="mdi mdi-magnify" style="transform: rotateY(180deg); font-size: 24px;"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">جستجو</label>
                                <input type="search" class="form-control" name="q" id="q"
                                       placeholder="جستجوی محصول ..." required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="mdi mdi-magnify" style="transform: rotateY(180deg); font-size: 24px;"></i>
                                </button>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div>
                
                <div class="header-right">
                    <div class="account">
                        <a href="dashboard.html" title="My account">
                            <div class="icon">
                                <i class="mdi mdi-account-outline"></i>
                            </div>
                            <p>حساب کاربری</p>
                        </a>
                    </div><!-- End .compare-dropdown -->
                    
                    <div class="wishlist">
                        <a href="wishlist.html" title="لیست محصولات مورد علاقه شما">
                            <div class="icon">
                                <i class="mdi mdi-cards-heart-outline"></i>
                                <span class="wishlist-count badge">3</span>
                            </div>
                            <p>لیست علاقه مندی ها</p>
                        </a>
                    </div><!-- End .compare-dropdown -->
                    
                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-display="static">
                            <div class="icon">
                                {{--                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
                                <i class="mdi mdi-cart-outline"></i>
                                <span class="cart-count">2</span>
                            </div>
                            <p>سبد خرید</p>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">کتونی ورزشی مخصوص دویدن رنگ بژ</a>
                                        </h4>
                                        
                                        <span class="cart-product-info">
                                                <span class="cart-product-qty">1 x </span>
                                                84,000 تومان
                                            </span>
                                    </div><!-- End .product-cart-details -->
                                    
                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('public-storefront/images/products/cart/product-1.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="حذف محصول"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                                
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">لباس زنانه آبی</a>
                                        </h4>
                                        
                                        <span class="cart-product-info">
                                                <span class="cart-product-qty">1 x </span>
                                                76,000 تومان
                                            </span>
                                    </div><!-- End .product-cart-details -->
                                    
                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('public-storefront/images/products/cart/product-2.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="حذف محصول"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                            </div><!-- End .cart-product -->
                            
                            <div class="dropdown-cart-total">
                                <span>مجموع</span>
                                
                                <span class="cart-total-price">160,000 تومان</span>
                            </div><!-- End .dropdown-cart-total -->
                            
                            <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-primary">مشاهده سبد خرید</a>
                                <a href="checkout.html" class="btn btn-outline-primary-2"><span>پرداخت</span><i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
        
        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="header-left">
                    <div class="dropdown category-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-display="static"
                           title="فهرست دسته بندی ها">
                            فهرست دسته بندی ها
                        </a>
                        
                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows">
                                    <li class="item-lead"><a href="#">تخفیف های روزانه</a></li>
                                    <li class="item-lead"><a href="#">هدیه ها</a></li>
                                    <li><a href="#">تخت خواب</a></li>
                                    <li><a href="#">روشنایی</a></li>
                                    <li><a href="#">مبل</a></li>
                                    <li><a href="#">حافظه های ذخیره سازی</a></li>
                                    <li><a href="#">میز و صندلی</a></li>
                                    <li><a href="#">وسایل تزیینی </a></li>
                                    <li><a href="#">کابینت آشپزخانه</a></li>
                                    <li><a href="#">قهوه</a></li>
                                    <li><a href="#">لوازم تعمیرات </a></li>
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .header-left -->
                
                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="index-1.html" class="sf-with-ul"> خانه </a>
                                
                                <div class="megamenu demo">
                                    <div class="menu-col">
                                        <div class="menu-title">دمو خود را انتخاب کنید</div><!-- End .menu-title -->
                                        
                                        <div class="demo-list">
                                            <div class="demo-item">
                                                <a href="index-1.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/1.jpg') }});"></span>
                                                    <span class="demo-title">01 - فروشگاه مبلمان</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-2.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/2.jpg') }});"></span>
                                                    <span class="demo-title">02 - فروشگاه مبلمان</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-3.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/3.jpg') }});"></span>
                                                    <span class="demo-title">03 - فروشگاه لوازم الکترونیکی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-4.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/4.jpg') }});"></span>
                                                    <span class="demo-title">04 - فروشگاه لوازم الکترونیکی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-5.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/5.jpg') }});"></span>
                                                    <span class="demo-title">05 - فروشگاه مد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-6.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/6.jpg') }});"></span>
                                                    <span class="demo-title">06 - فروشگاه مد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-7.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/7.jpg') }});"></span>
                                                    <span class="demo-title">07 - فروشگاه مد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-8.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/8.jpg') }});"></span>
                                                    <span class="demo-title">08 - فروشگاه مد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-9.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/9.jpg') }});"></span>
                                                    <span class="demo-title">09 - فروشگاه مد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item">
                                                <a href="index-10.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/10.jpg') }});"></span>
                                                    <span class="demo-title">10 - فروشگاه کفش</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-11.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/11.jpg') }});"></span>
                                                    <span class="demo-title">11 - فروشگاه مبل</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-12.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/12.jpg') }});"></span>
                                                    <span class="demo-title">12 - فروشگاه مُد</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-13.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/13.jpg') }});"></span>
                                                    <span class="demo-title">13 - بازار</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-14.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/14.jpg') }});"></span>
                                                    <span class="demo-title">14 - بازار تمام عرض</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-15.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/15.jpg') }});"></span>
                                                    <span class="demo-title">15 - مد و زیبایی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-16.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/16.jpg') }});"></span>
                                                    <span class="demo-title">16 - مُد و زیبایی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-17.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/17.jpg') }});"></span>
                                                    <span class="demo-title">17 - فروشگاه مُد و لباس</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-18.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/18.jpg') }});"></span>
                                                    <span class="demo-title">18 - فروشگاه مُد و لباس (با
                                                            سایدبار)</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-19.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/19.jpg') }});"></span>
                                                    <span class="demo-title">19 - فروشگاه بازی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-20.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/20.jpg') }});"></span>
                                                    <span class="demo-title">20 - فروشگاه کتاب</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-21.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/21.jpg') }});"></span>
                                                    <span class="demo-title">21 - فروشگاه ورزشی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-22.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/22.jpg') }});"></span>
                                                    <span class="demo-title">22 - فروشگاه ابزار</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-23.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/23.jpg') }});"></span>
                                                    <span class="demo-title">23 - -فروشگاه مد با نوبار سمت
                                                            راست</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-24.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/24.jpg') }});"></span>
                                                    <span class="demo-title">24 - فروشگاه ورزشی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-25.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/25.jpg') }});"></span>
                                                    <span class="demo-title">25 - فروشگاه زیورآلات</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-26.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/26.jpg') }});"></span>
                                                    <span class="demo-title">26 - فروشگاه بازار</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-27.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/27.jpg') }});"></span>
                                                    <span class="demo-title">27 - فروشگاه مُد</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-28.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/28.jpg') }});"></span>
                                                    <span class="demo-title">28 - فروشگاه مواد غذایی</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-29.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/29.jpg') }});"></span>
                                                    <span class="demo-title">29 - فروشگاه تی شرت</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-30.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/30.jpg') }});"></span>
                                                    <span class="demo-title">30 - فروشگاه هدفون</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                            
                                            <div class="demo-item hidden">
                                                <a href="index-31.html">
                                                        <span class="demo-bg"
                                                              style="background-image: url({{ asset('public-storefront/images/menu/demos/31.jpg') }});"></span>
                                                    <span class="demo-title">31 - فروشگاه یوگا</span>
                                                </a>
                                            </div><!-- End .demo-item -->
                                        </div><!-- End .demo-list -->
                                        
                                        <div class="megamenu-action text-center">
                                            <a href="demo.html"
                                               class="btn btn-outline-primary-2 view-all-demos"><span>مشاهده همه
                                                        دمو ها</span><i class="icon-long-arrow-left"></i></a>
                                        </div><!-- End .text-center -->
                                    </div><!-- End .menu-col -->
                                </div><!-- End .megamenu -->
                            </li>
                            <li>
                                <a href="category.html" class="sf-with-ul"> فروشگاه </a>
                                
                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">فروشگاه با سایدبار</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-list.html">فروشگاه لیست</a></li>
                                                            <li><a href="category-2cols.html">فروشگاه 2 ستونه</a>
                                                            </li>
                                                            <li><a href="category.html">فروشگاه 3 ستونه</a></li>
                                                            <li><a href="category-4cols.html">فروشگاه 4 ستونه</a>
                                                            </li>
                                                            <li><a href="category-market.html"><span>فروشگاه
                                                                            بازار<span
                                                                                class="tip tip-new">جدید</span></span></a>
                                                            </li>
                                                        </ul>
                                                        
                                                        <div class="menu-title">فروشگاه بدون سایدبار</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-boxed.html"><span>فروشگاه با حالت
                                                                            باکس<span
                                                                                class="tip tip-hot">ویژه</span></span></a>
                                                            </li>
                                                            <li><a href="category-fullwidth.html">فروشگاه تمام
                                                                                                  صفحه</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="menu-title">دسته بندی محصولات</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="product-category-boxed.html">دسته بندی
                                                                                                      محصولات با حالت
                                                                                                      باکس</a></li>
                                                            <li><a href="product-category-fullwidth.html"><span>دسته
                                                                            بندی محصولات تمام صفحه<span
                                                                                class="tip tip-new">جدید</span></span></a>
                                                            </li>
                                                        </ul>
                                                        <div class="menu-title">صفحات فروشگاه</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="cart.html">سبد خرید</a></li>
                                                            <li><a href="cart2.html">سبد خرید 2</a></li>
                                                            <li><a href="cart-empty.html">سبد خرید خالی</a></li>
                                                            <li><a href="checkout.html">پرداخت</a></li>
                                                            <li><a href="checkout2.html">پرداخت 2</a></li>
                                                            <li><a href="compare.html">مقایسه محصولات</a></li>
                                                            <li><a href="compare2.html">مقایسه محصولات 2</a></li>
                                                            <li><a href="wishlist.html">لیست علاقه مندی ها</a></li>
                                                            <li><a href="gift-cart.html">کارت هدیه</a></li>
                                                            <li><a href="dashboard.html">داشبورد</a></li>
                                                        
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                        
                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="{{ asset('public-storefront/images/menu/banner-1.jpg') }}" alt="Banner">
                                                    
                                                    <div class="banner-content banner-content-top">
                                                        <div class="banner-title text-white">آخرین
                                                            <br>شانس<br><span><strong>فروش</strong></span></div>
                                                        <!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>
                            <li>
                                <a href="product.html" class="sf-with-ul"> محصول </a>
                                
                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                <div class="menu-title">جزئیات محصول</div>
                                                <!-- End .menu-title -->
                                                <ul>
                                                    <li><a href="product.html">پیش فرض</a></li>
                                                    <li><a href="product-centered.html">توضیحات وسط چین</a></li>
                                                    <li><a href="product-extended.html"><span>توضیحات گسترده<span
                                                                        class="tip tip-new">جدید</span></span></a></li>
                                                    <li><a href="product-gallery.html">گالری</a></li>
                                                    <li><a href="product-sticky.html">اطلاعات چسبیده</a></li>
                                                    <li><a href="product-sidebar.html">صفحه جمع با سایدبار</a></li>
                                                    <li><a href="product-fullwidth.html">تمام عرض</a></li>
                                                    <li><a href="product-masonry.html">اطلاعات چسبیده</a></li>
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-6 -->
                                        
                                        <div class="col-md-6">
                                            <div class="banner banner-overlay">
                                                <a href="category.html">
                                                    <img src="{{ asset('public-storefront/images/menu/banner-2.jpg') }}" alt="Banner">
                                                    
                                                    <div class="banner-content banner-content-bottom">
                                                        <div class="banner-title text-white">محصولات
                                                                                             جدید<br><span><strong>بهار 1401</strong></span>
                                                        </div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner -->
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-sm -->
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul"> صفحات </a>
                                
                                <ul>
                                    <li>
                                        <a href="about.html" class="sf-with-ul">درباره ما</a>
                                        
                                        <ul>
                                            <li><a href="about.html">درباره ما 01</a></li>
                                            <li><a href="about-2.html">درباره ما 02</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html" class="sf-with-ul">تماس با ما</a>
                                        
                                        <ul>
                                            <li><a href="contact.html">تماس با ما 01</a></li>
                                            <li><a href="contact-2.html">تماس با ما 02</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="invoice-template/invoice-template.html" class="sf-with-ul">قالب
                                                                                                            فاکتور</a>
                                        
                                        <ul>
                                            <li><a href="invoice-template/invoice-template.html">قالب فاکتور 01</a></li>
                                            <li><a href="invoice-template/invoice-template2.html">قالب فاکتور 02</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="email-template/email-template.html" class="sf-with-ul">قالب
                                                                                                        ایمیل</a>
                                        
                                        <ul>
                                            <li><a href="email-template/email-template.html">قالب ایمیل 01</a>
                                            </li>
                                            <li><a href="email-template/email-order-success.html">قالب ایمیل 02 - سفارش
                                                                                                  موفق</a>
                                            </li>
                                            <li><a href="email-template/email-promotional.html">قالب ایمیل 03</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="login.html">ورود</a></li>
                                    <li><a href="forget-password.html">فراموشی رمز عبور</a></li>
                                    <li><a href="track-order.html">پیگیری سفارش</a></li>
                                    <li><a href="faq.html">سوالات متداول</a></li>
                                    <li><a href="404.html">خطای 404</a></li>
                                    <li><a href="coming-soon.html">به زودی</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html" class="sf-with-ul"> اخبار </a>
                                
                                <ul>
                                    <li><a href="blog.html">کلاسیک</a></li>
                                    <li><a href="blog-listing.html">لیست</a></li>
                                    <li>
                                        <a href="#">شبکه بندی</a>
                                        <ul>
                                            <li><a href="blog-grid-2cols.html">2 ستونه</a></li>
                                            <li><a href="blog-grid-3cols.html">3 ستونه</a></li>
                                            <li><a href="blog-grid-4cols.html">4 ستونه</a></li>
                                            <li><a href="blog-grid-sidebar.html">با سایدبار</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">سایز های مختلف</a>
                                        <ul>
                                            <li><a href="blog-masonry-2cols.html">2 ستونه</a></li>
                                            <li><a href="blog-masonry-3cols.html">3 ستونه</a></li>
                                            <li><a href="blog-masonry-4cols.html">4 ستونه</a></li>
                                            <li><a href="blog-masonry-sidebar.html">با سایدبار</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">ماسک</a>
                                        <ul>
                                            <li><a href="blog-mask-grid.html">نوع 1</a></li>
                                            <li><a href="blog-mask-masonry.html">نوع 2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">پست تکی</a>
                                        <ul>
                                            <li><a href="single.html">پیش فرض با سایدبار</a></li>
                                            <li><a href="single-fullwidth.html">تمام صفحه بدون سایدبار</a></li>
                                            <li><a href="single-fullwidth-sidebar.html">تمام صفحه باسایدبار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="elements-list.html" class="sf-with-ul"> عناصر طراحی </a>
                                
                                <ul>
                                    <li><a href="elements-products.html">محصولات</a></li>
                                    <li><a href="elements-typography.html">تایپوگرافی</a></li>
                                    <li><a href="elements-titles.html">عناوین</a></li>
                                    <li><a href="elements-banners.html">بنرها</a></li>
                                    <li><a href="elements-product-category.html">دسته بندی محصولات</a></li>
                                    <li><a href="elements-video-banners.html">بنرهای ویدیویی</a></li>
                                    <li><a href="elements-buttons.html">دکمه ها</a></li>
                                    <li><a href="elements-accordions.html">آکاردئون</a></li>
                                    <li><a href="elements-lookbook.html">لوک بوک</a></li>
                                    <li><a href="elements-tabs.html">تب ها</a></li>
                                    <li><a href="elements-testimonials.html">توصیف و نقل قول</a></li>
                                    <li><a href="elements-blog-posts.html">اخبار</a></li>
                                    <li><a href="elements-portfolio.html">نمونه کار</a></li>
                                    <li><a href="elements-cta.html">پاسخ به عمل</a></li>
                                    <li><a href="elements-icon-boxes.html">باکس های آیکون</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-center -->
                
                <div class="header-right">
                    <i class="mdi mdi-lightbulb-on-outline"></i>
                    <p>خرید<span class="highlight">&nbsp;تا 30 درصد تخفیف</span></p>
                </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->
    
    <main class="main">
        <div class="intro-slider-container">
            <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
                 data-owl-options='{"nav": true, "rtl": true}'>
                <div class="intro-slide"
                     style="background-image: url({{ asset('public-storefront/images/demos/demo-2/slider/slide-1.jpg') }});">
                    <div class="container intro-content">
                        <h3 class="intro-subtitle">مبل تخت خواب شو</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">بهترین انتخاب <br>مطابق سلیقه شما</h1><!-- End .intro-title -->
                        
                        <a href="category.html" class="btn btn-primary">
                            <span>خرید</span>
                            <i class="mdi mdi-arrow-left-thin"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
                
                <div class="intro-slide"
                     style="background-image: url({{ asset('public-storefront/images/demos/demo-2/slider/slide-2.jpg') }});">
                    <div class="container intro-content">
                        <h3 class="intro-subtitle">پیشنهاد جدید</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">میز <br>قهوه خوری <br><span
                                    class="text-primary">49,000<sup>تومان</sup></span></h1><!-- End .intro-title -->
                        
                        <a href="category.html" class="btn btn-primary">
                            <span>خرید</span>
                            <i class="mdi mdi-arrow-left-thin"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
                
                <div class="intro-slide"
                     style="background-image: url({{ asset('public-storefront/images/demos/demo-2/slider/slide-3.jpg') }});">
                    <div class="container intro-content">
                        <h3 class="intro-subtitle">اتاق نشیمن</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">
                            طراحی اتاق نشیمن <br>مطابق سلیقه شما<br>
                            <span class="text-primary">
                                    <sup class="text-white font-weight-light">از</sup>99,000<sup>تومان</sup>
                                </span>
                        </h1><!-- End .intro-title -->
                        
                        <a href="category.html" class="btn btn-primary">
                            <span>خرید</span>
                            <i class="mdi mdi-arrow-left-thin"></i>
                        </a>
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->
            </div><!-- End .owl-carousel owl-simple -->
            
            <span class="slider-loader text-white"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->
        
        <div class="brands-border owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                    "nav": false,
                    "dots": false,
                    "margin": 0,
                    "loop": false,
                    "rtl": true,
                            "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        },
                        "1360": {
                            "items":7
                        }
                    }
                }'>
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/1.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/2.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/3.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/4.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/5.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/6.png') }}" alt="نام برند">
            </a>
            
            <a href="#" class="brand">
                <img src="{{ asset('public-storefront/images/brands/7.png') }}" alt="نام برند">
            </a>
        </div><!-- End .owl-carousel -->
        
        <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->
        
        <div class="banner-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="banner banner-large banner-overlay banner-overlay-light">
                            <a href="#">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/banners/banner-1.jpg') }}" alt="بنر">
                            </a>
                            
                            <div class="banner-content banner-content-top">
                                <h4 class="banner-subtitle">پیشنهاد ویژه</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">میز قهوه</h3><!-- End .banner-title -->
                                <div class="banner-text">از 19,000 تومان</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-gray banner-link">خرید<i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-5 -->
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/banners/banner-2.jpg') }}" alt="بنر">
                            </a>
                            
                            <div class="banner-content banner-content-bottom">
                                <h4 class="banner-subtitle text-grey">برای فروش</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white">صندلی های <br>فوق العاده</h3>
                                                                                    <!-- End .banner-title -->
                                <div class="banner-text text-white">از 39,000 تومان</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-white banner-link">مشاهده<i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-3 -->
                    
                    <div class="col-md-6 col-lg-4">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/banners/banner-3.jpg') }}" alt="بنر">
                            </a>
                            
                            <div class="banner-content banner-content-top">
                                <h4 class="banner-subtitle text-grey">محصولات جدید</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white">جعبه <br>و سبد</h3>
                                                                                       <!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">مشاهده<i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                        
                        <div class="banner banner-overlay banner-overlay-light">
                            <a href="#">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/banners/banner-4.jpg') }}" alt="بنر">
                            </a>
                            
                            <div class="banner-content banner-content-top">
                                <h4 class="banner-subtitle">برای فروش</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">تخفف لامپ</h3><!-- End .banner-title -->
                                <div class="banner-text">تا 30% تخفیف</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-gray banner-link">خرید<i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .banner-group -->
        
        <div class="mb-3"></div><!-- End .mb-6 -->
        
        <div class="container">
            <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="products-featured-link" data-toggle="tab"
                       href="#products-featured-tab" role="tab" aria-controls="products-featured-tab"
                       aria-selected="true">مبلمان</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab"
                       role="tab" aria-controls="products-sale-tab" aria-selected="false">بیشترین فروش</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab"
                       aria-controls="products-top-tab" aria-selected="false">بیشترین امتیاز</a>
                </li>
            </ul>
        </div><!-- End .container -->
        
        <div class="container-fluid">
            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
                     aria-labelledby="products-featured-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                         data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چهارپایه چوبی
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    251,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-2-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-2-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چراغ روشنایی اوکتو
                                                                                             4240</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    746,000 تومان
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #1f1e18;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-3-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-3-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">صندلی راحتی جدید
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    970,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-4-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-4-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">مبل تخت خواب شو</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">337,000 تومان</span>
                                    <span class="old-price">449,000</span>
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #878883;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #dfd5c2;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-5-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-5-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چراغ رومیزی زیبا</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    675,000 تومان
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #74543e;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-6-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-6-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">صندلی پلاستیکی
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    475,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چهارپایه چوبی
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    251,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel"
                     aria-labelledby="products-sale-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                         data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-5-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-5-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چراغ رومیزی زیبا</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    675,000 تومان
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #74543e;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-6-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-6-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">صندلی پلاستیکی
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    475,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-1-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چهارپایه چوبی
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    251,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel"
                     aria-labelledby="products-top-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                         data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-2-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-2-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">چراغ روشنایی اوکتو
                                                                                             4240</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    746,000 تومان
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #1f1e18;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #e8e8e8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-3-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-3-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">صندلی راحتی جدید
                                    </a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    970,000 تومان
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                        
                        <div class="product product-11 text-center">
                            <figure class="product-media">
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-4-1.jpg') }}" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-4-2.jpg') }}" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>
                                
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action-vertical -->
                            
                            </figure><!-- End .product-media -->
                            
                            <div class="product-body">
                                <h3 class="product-title text-center"><a href="product.html">مبل تخت خواب شو</a>
                                </h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">337,000 تومان</span>
                                    <span class="old-price">449,000</span>
                                </div><!-- End .product-price -->
                                
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #878883;"><span
                                                class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #dfd5c2;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container-fluid -->
        
        <div class="mb-5"></div><!-- End .mb-5 -->
        
        <div class="bg-light deal-container pt-5 pb-3 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="deal">
                            <div class="deal-content text-right">
                                <h4>تعداد محدود</h4>
                                <h2>پیشنهاد روزانه</h2>
                                
                                <h3 class="product-title"><a href="product.html">صندلی راحتی</a></h3>
                                <!-- End .product-title -->
                                
                                <div class="product-price">
                                    <span class="new-price">149,000 تومان</span>
                                    <span class="old-price">240,000</span>
                                </div><!-- End .product-price -->
                                
                                <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                                
                                <a href="product.html" class="btn btn-primary">
                                    <span>خرید</span><i class="icon-long-arrow-left"></i>
                                </a>
                            </div><!-- End .deal-content -->
                            <div class="deal-image">
                                <a href="product.html">
                                    <img src="{{ asset('public-storefront/images/demos/demo-2/deal/product-1.jpg') }}" alt="image">
                                </a>
                            </div><!-- End .deal-image -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-9 -->
                    
                    <div class="col-lg-3">
                        <div class="banner banner-overlay banner-overlay-light text-center d-none d-lg-block">
                            <a href="#">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/banners/banner-5.jpg') }}" alt="بنر">
                            </a>
                            
                            <div class="banner-content banner-content-top banner-content-center text-center">
                                <h4 class="banner-subtitle">بهترین انتخاب</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">صندلی حصیری</h3><!-- End .banner-title -->
                                <div class="banner-text text-primary">49,000 تومان</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-gray banner-link">خرید<i
                                            class="icon-long-arrow-left"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light -->
        
        <div class="mb-6"></div><!-- End .mb-6 -->
        
        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title text-center">پرفروش ترین محصولات</h2><!-- End .title -->
                
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab"
                           role="tab" aria-controls="top-all-tab" aria-selected="true">همه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-tab" role="tab"
                           aria-controls="top-fur-tab" aria-selected="false">مبل</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-decor-link" data-toggle="tab" href="#top-decor-tab" role="tab"
                           aria-controls="top-decor-tab" aria-selected="false">دکور</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-light-link" data-toggle="tab" href="#top-light-tab" role="tab"
                           aria-controls="top-light-tab" aria-selected="false">روشنایی</a>
                    </li>
                </ul>
            </div><!-- End .heading -->
            
            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel"
                     aria-labelledby="top-all-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-7-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-7-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">چراغ های رومیزی
                                                                                                     زیبا</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-8-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-8-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">نگه دارنده
                                                                                                     هیزم</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                        
                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #927764;"><span class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-9-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-9-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی راحتی
                                                                                                     باغ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">94,000 تومان</span>
                                            <span class="old-price">108,00</span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-10-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-10-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">لامپ سقفی
                                                                                                     بزرگ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                        
                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #e8e8e8;"><span
                                                        class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-11-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-11-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی بین
                                                                                                     بگ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            259,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-12-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-12-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">مبل 2 </a>
                                        </h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            980,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-13-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-13-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی پشت
                                                                                                     دار</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            945,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-14-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-14-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">روشنایی 3
                                                                                                     تیکه</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            199,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-15-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-15-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">روشنایی 3
                                                                                                     تیکه</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            199,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-16-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-16-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">لامپ رومیزی</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            499,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-fur-tab" role="tabpanel" aria-labelledby="top-fur-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-9-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-9-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی راحتی
                                                                                                     باغ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">94,000 تومان</span>
                                            <span class="old-price">94,000</span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-12-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-12-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">مبل 2 </a>
                                        </h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            980,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-13-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-13-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">مبل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی پشت
                                                                                                     دار</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            945,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-decor-tab" role="tabpanel" aria-labelledby="top-decor-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-8-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-8-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">نگه دارنده
                                                                                                     هیزم</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                        
                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #927764;"><span class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-11-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-11-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">صندلی بین
                                                                                                     بگ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            259,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-14-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-14-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">روشنایی 3
                                                                                                     تیکه</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            199,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-15-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-15-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">دکور</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">روشنایی 3
                                                                                                     تیکه</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            199,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-light-tab" role="tabpanel" aria-labelledby="top-light-link">
                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-7-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-7-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">چراغ های رومیزی
                                                                                                     زیبا</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-10-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-10-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">لامپ سقفی
                                                                                                     بزرگ</a></h3>
                                              <!-- End .product-title -->
                                        <div class="product-price">
                                            401,000 تومان
                                        </div><!-- End .product-price -->
                                        
                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #e8e8e8;"><span
                                                        class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            
                            <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                <div class="product product-11 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-16-1.jpg') }}"
                                                 alt="تصویر محصول" class="product-image">
                                            <img src="{{ asset('public-storefront/images/demos/demo-2/products/product-16-2.jpg') }}"
                                                 alt="تصویر محصول" class="product-image-hover">
                                        </a>
                                        
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist "><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->
                                    
                                    <div class="product-body">
                                        <div class="product-cat text-center">
                                            <a href="#">روشنایی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title text-center"><a href="product.html">لامپ رومیزی</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            499,000 تومان
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
        
        <div class="container">
            <hr class="mt-1 mb-6">
        </div><!-- End .container -->
        
        <div class="blog-posts">
            <div class="container">
                <h2 class="title text-center">اخبار فروشگاه ما</h2><!-- End .title-lg text-center -->
                
                <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "rtl": true,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/blog/post-1.jpg') }}" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->
                        
                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">22 اسفند 1401</a>, 0 دیدگاه
                            </div><!-- End .entry-meta -->
                            
                            <h3 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی</a>
                            </h3><!-- End .entry-title -->
                            
                            <div class="entry-content">
                                <a href="single.html" class="read-more">ادامه خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/blog/post-2.jpg') }}" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->
                        
                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">12 اسفند 1401</a>, 0 دیدگاه
                            </div><!-- End .entry-meta -->
                            
                            <h3 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی</a>
                            </h3><!-- End .entry-title -->
                            
                            <div class="entry-content">
                                <a href="single.html" class="read-more">ادامه خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="{{ asset('public-storefront/images/demos/demo-2/blog/post-3.jpg') }}" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->
                        
                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">10 اسفند 1401</a>, 2 دیدگاه
                            </div><!-- End .entry-meta -->
                            
                            <h3 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی</a>
                            </h3><!-- End .entry-title -->
                            
                            <div class="entry-content">
                                <a href="single.html" class="read-more">ادامه خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .owl-carousel -->
                
                <div class="more-container text-center mt-2">
                    <a href="blog.html" class="btn btn-outline-darker btn-more"><span>مشاهده اخبار بیشتر</span><i
                                class="icon-long-arrow-left"></i></a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->
        </div><!-- End .blog-posts -->
    </main><!-- End .main -->
    
    <footer class="footer footer-2">
        <div class="icon-boxes-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">ارسال رایگان</h3><!-- End .icon-box-title -->
                                <p>برای سفارشات بالای 50 هزار تومان</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>
                            
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">بازگرداندن رایگان</h3><!-- End .icon-box-title -->
                                <p>تا 30 روز بعد از خرید</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>
                            
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">20% تخفیف برای اولین خرید</h3>
                                <!-- End .icon-box-title -->
                                <p>کافیست ثبت نام کنید</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>
                            
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">پشتیبانی حرفه ای</h3><!-- End .icon-box-title -->
                                <p>خدمات حرفه ای 24 ساعته/7روز هفته</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->
        
        <div class="footer-newsletter bg-image" style="background-image: url({{ asset('public-storefront/images/backgrounds/bg-2.jpg') }})">
            <div class="container">
                <div class="heading text-center">
                    <h3 class="title text-center">اطلاع از آخرین تخفیف ها</h3><!-- End .title -->
                    <p class="title-desc text-center">و دریافت <span>تخفیف 20هزار تومانی</span> برای اولین خرید</p>
                                                                              <!-- End .title-desc -->
                </div><!-- End .heading -->
                
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <form action="#">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="آدرس ایمیل خود را وارد کنید"
                                       aria-label="Email Adress" aria-describedby="newsletter-btn" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"
                                            id="newsletter-btn"><span>عضویت</span><i
                                                class="icon-long-arrow-left"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                    </div><!-- End .col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-newsletter bg-image -->
        
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget widget-about">
                            <img src="{{ asset('public-storefront/images/demos/demo-2/logo.png') }}" class="footer-logo" alt="Footer Logo"
                                 width="105" height="25">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی
                               نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                               تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            
                            
                            <div class="widget-about-info">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <span class="widget-about-title">سوالی دارید؟ 7روز هفته/24ساعته</span>
                                        <a href="tel:123456789">02155667788</a>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div>
                        
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    
                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">لینک های مفید</h4><!-- End .widget-title -->
                            
                            <ul class="widget-list">
                                <li><a href="about.html">درباره ما</a></li>
                                <li><a href="#">خدمات</a></li>
                                <li><a href="#">نحوه خرید</a></li>
                                <li><a href="faq.html">سوالات متداول</a></li>
                                <li><a href="contact.html">تماس با ما</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->
                    
                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">خدمات مشتری</h4><!-- End .widget-title -->
                            
                            <ul class="widget-list">
                                <li><a href="#">شیوه پرداخت</a></li>
                                <li><a href="#">گارانتی بازگشت وجه</a></li>
                                <li><a href="#">شیوه ارسال محصولات</a></li>
                                <li><a href="#">قوانین و مقررات</a></li>
                                <li><a href="#">خط مشی</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->
                    
                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">حساب کاربری</h4><!-- End .widget-title -->
                            
                            <ul class="widget-list">
                                <li><a href="#">ورود</a></li>
                                <li><a href="cart.html">سبد خرید</a></li>
                                <li><a href="#">لیست علاقه مندی ها</a></li>
                                <li><a href="#">پیگیری سفارشات</a></li>
                                <li><a href="#">راهنما</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->
        
        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">کپی رایت © 2019 تمامی حقوق محفوظ است.</p>
                <!-- End .footer-copyright -->
                
                <div class="social-icons social-icons-color">
                    <span class="social-label">شبکه های اجتماعی</span>
                    <a href="#" class="social-icon social-facebook" title="فیسبوک" target="_blank"><i
                                class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="توییتر" target="_blank"><i
                                class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="اینستاگرام" target="_blank"><i
                                class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-youtube" title="یوتیوب" target="_blank"><i
                                class="icon-youtube"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="پینترست" target="_blank"><i
                                class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="بازگشت به بالا"><i class="mdi mdi-chevron-double-up"></i></button>

      <!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">جستجو</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                   placeholder="جستجو در ..." required>
            <button class="btn btn-primary" type="submit">
                <i class="mdi mdi-magnify" style="transform: rotateY(180deg); font-size: 24px;"></i></button>
        </form>
        
        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                   role="tab" aria-controls="mobile-menu-tab" aria-selected="true">منو</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab"
                   aria-controls="mobile-cats-tab" aria-selected="false">دسته بندی ها</a>
            </li>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                 aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="index-1.html"><i class="mdi mdi-chevron-down"></i> خانه</a>
                            
                            <ul>
                                <li><a href="index-1.html">01 - فروشگاه مبلمان</a></li>
                                <li><a href="index-2.html">02 - فروشگاه مبلمان</a></li>
                                <li><a href="index-3.html">03 - فروشگاه لوازم الکترونیکی</a></li>
                                <li><a href="index-4.html">04 - فروشگاه لوازم الکترونیکی</a></li>
                                <li><a href="index-5.html">05 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-6.html">06 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-7.html">07 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-8.html">08 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-9.html">09 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-10.html">10 - فروشگاه کفش</a></li>
                                <li><a href="index-11.html">11 - فروشگاه مبل</a></li>
                                <li><a href="index-12.html">12 - فروشگاه مد</a></li>
                                <li><a href="index-13.html">13 - بازار</a></li>
                                <li><a href="index-14.html">14 - بازار تمام عرض</a></li>
                                <li><a href="index-15.html">15 - مد و زیبایی</a></li>
                                <li><a href="index-16.html">16 - مد و زیبایی</a></li>
                                <li><a href="index-17.html">17 - فروشگاه مد و لباس</a></li>
                                <li><a href="index-18.html">18 - فروشگاه مد (با سایدبار)</a></li>
                                <li><a href="index-19.html">19 - فروشگاه بازی</a></li>
                                <li><a href="index-20.html">20 - فروشگاه کتاب</a></li>
                                <li><a href="index-21.html">21 - فروشگاه ورزشی</a></li>
                                <li><a href="index-22.html">22 - فروشگاه ابزار</a></li>
                                <li><a href="index-23.html">23 - فروشگاه مد با نوبار سمت راست</a></li>
                                <li><a href="index-24.html">24 - فروشگاه ورزشی</a></li>
                                <li><a href="index-25.html">25 - فروشگاه زیورآلات</a></li>
                                <li><a href="index-26.html">26 - فروشگاه بازار</a></li>
                                <li><a href="index-27.html">27 - فروشگاه مُد</a></li>
                                <li><a href="index-28.html">28 - فروشگاه مواد غذایی</a></li>
                                <li><a href="index-29.html">29 - فروشگاه تی شرت</a></li>
                                <li><a href="index-30.html">30 - فروشگاه هدفون</a></li>
                                <li><a href="index-31.html">31 - فروشگاه یوگا</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="category.html">فروشگاه</a>
                            <ul>
                                <li><a href="category-list.html">فروشگاه لیست</a></li>
                                <li><a href="category-2cols.html">2 ستونه</a></li>
                                <li><a href="category.html">3 ستونه</a></li>
                                <li><a href="category-4cols.html">4 ستونه</a></li>
                                <li><a href="category-boxed.html"><span>فروشگاه با حالت بسته بدون سایدبار<span
                                                    class="tip tip-hot">ویژه</span></span></a></li>
                                <li><a href="category-fullwidth.html">فروشگاه تمام عرض بدون سایدبار</a></li>
                                <li><a href="product-category-boxed.html">دسته بندی محصولات با حالت بسته</a></li>
                                <li><a href="product-category-fullwidth.html"><span>دسته بندی محصولات تمام عرض<span
                                                    class="tip tip-new">جدید</span></span></a></li>
                                <li><a href="cart.html">سبد خرید</a></li>
                                <li><a href="checkout.html">پرداخت</a></li>
                                <li><a href="checkout2.html">پرداخت 2</a></li>
                                <li><a href="compare.html">مقایسه محصولات</a></li>
                                <li><a href="compare2.html">مقایسه محصولات 2</a></li>
                                <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                                <li><a href="gift-cart.html">کارت هدیه</a></li>
                                <li><a href="dashboard.html">داشبورد</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">محصولات</a>
                            <ul>
                                <li><a href="product.html">پیش فرض</a></li>
                                <li><a href="product-centered.html">توضیحات وسط چین</a></li>
                                <li><a href="product-extended.html"><span>توضیحات گسترده<span
                                                    class="tip tip-new">جدید</span></span></a></li>
                                <li><a href="product-gallery.html">گالری</a></li>
                                <li><a href="product-sticky.html">اطلاعات چسبیده</a></li>
                                <li class=""><a href="product-sidebar.html">صفحه جمع با سایدبار</a></li>
                                <li><a href="product-fullwidth.html">تمام صفحه</a></li>
                                <li><a href="product-masonry.html">اطلاعات چسبیده</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">صفحات</a>
                            <ul>
                                <li>
                                    <a href="about.html" class="sf-with-ul">درباره ما</a>
                                    
                                    <ul style="display: none;">
                                        <li><a href="about.html">درباره ما 01</a></li>
                                        <li><a href="about-2.html">درباره ما 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html" class="sf-with-ul">تماس با ما</a>
                                    
                                    <ul style="display: none;">
                                        <li><a href="contact.html">تماس با ما 01</a></li>
                                        <li><a href="contact-2.html">تماس با ما 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.html">ورود</a></li>
                                <li><a href="forget-password.html">فراموشی رمز عبور</a></li>
                                <li><a href="track-order.html">پیگیری سفارش</a></li>
                                <li><a href="faq.html">سوالات متداول</a></li>
                                <li><a href="404.html">خطای 404</a></li>
                                <li><a href="coming-soon.html">به زودی</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html">اخبار</a>
                            
                            <ul>
                                <li class=""><a href="blog.html">کلاسیک</a></li>
                                <li><a href="blog-listing.html">لیست</a></li>
                                <li>
                                    <a href="#" class="sf-with-ul">شبکه بندی</a>
                                    <ul style="display: none;">
                                        <li><a href="blog-grid-2cols.html">2 ستونه</a></li>
                                        <li><a href="blog-grid-3cols.html">3 ستونه</a></li>
                                        <li><a href="blog-grid-4cols.html">4 ستونه</a></li>
                                        <li><a href="blog-grid-sidebar.html">با سایدبار</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">سایز های مختلف</a>
                                    <ul style="display: none;">
                                        <li><a href="blog-masonry-2cols.html">2 ستونه</a></li>
                                        <li><a href="blog-masonry-3cols.html">3 ستونه</a></li>
                                        <li><a href="blog-masonry-4cols.html">4 ستونه</a></li>
                                        <li><a href="blog-masonry-sidebar.html">با سایدبار</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">ماسک</a>
                                    <ul style="display: none;">
                                        <li><a href="blog-mask-grid.html">نوع 1</a></li>
                                        <li><a href="blog-mask-masonry.html">نوع 2</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">پست تکی</a>
                                    <ul style="display: none;">
                                        <li><a href="single.html">پیش فرض با سایدبار</a></li>
                                        <li><a href="single-fullwidth.html">تمام صفحه بدون سایدبار</a></li>
                                        <li><a href="single-fullwidth-sidebar.html">تمام صفحه باسایدبار</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="elements-list.html">عناصر طراحی</a>
                            <ul>
                                <li class=""><a href="elements-products.html">محصولات</a></li>
                                <li><a href="elements-typography.html">تایپوگرافی</a></li>
                                <li><a href="elements-titles.html">عناوین</a></li>
                                <li><a href="elements-banners.html">بنرها</a></li>
                                
                                <li><a href="elements-product-category.html">دسته بندی محصولات</a></li>
                                <li><a href="elements-video-banners.html">بنرهای ویدیویی</a></li>
                                <li><a href="elements-buttons.html">دکمه ها</a></li>
                                <li><a href="elements-accordions.html">آکاردئون</a></li>
                                <li><a href="elements-lookbook.html">لوک بوک</a></li>
                                <li><a href="elements-tabs.html">تب ها</a></li>
                                <li><a href="elements-testimonials.html">توصیف و نقل قول</a></li>
                                <li><a href="elements-blog-posts.html">اخبار</a></li>
                                <li><a href="elements-portfolio.html">نمونه کار</a></li>
                                <li><a href="elements-cta.html">پاسخ به عمل</a></li>
                                <li><a href="elements-icon-boxes.html">باکس های آیکون</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <li><a class="mobile-cats-lead" href="#">پیشنهاد روزانه</a></li>
                        <li><a class="mobile-cats-lead" href="#">هدیه</a></li>
                        <li><a href="#">تخت خواب</a></li>
                        <li><a href="#">روشنایی</a></li>
                        <li><a href="#">مبلمان</a></li>
                        <li><a href="#">فضای ذخیره سازی</a></li>
                        <li><a href="#">میز وصندلی</a></li>
                        <li><a href="#">دکور </a></li>
                        <li><a href="#">کابینت</a></li>
                        <li><a href="#">قهوه</a></li>
                        <li><a href="#">مبلمان خارج از منزل </a></li>
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
        
        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="فیسبوک"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="توییتر"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="اینستاگرام"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="یوتیوب"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

      <!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                   role="tab" aria-controls="signin" aria-selected="true">ورود</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                   aria-controls="register" aria-selected="false">ثبت نام</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                 aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">نام کاربری یا آدرس ایمیل *</label>
                                        <input type="text" class="form-control" id="singin-email"
                                               name="singin-email" required>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="singin-password">رمز عبور *</label>
                                        <input type="password" class="form-control" id="singin-password"
                                               name="singin-password" required>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ورود</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>
                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">مرا به خاطر
                                                                                                      بسپار</label>
                                        </div><!-- End .custom-checkbox -->
                                        
                                        <a href="#" class="forgot-link">فراموشی رمز عبور؟</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">یا ورود با</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                حساب گوگل
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                حساب فیسبوک
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-email">آدرس ایمیل شما *</label>
                                        <input type="email" class="form-control" id="register-email"
                                               name="register-email" required>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-group">
                                        <label for="register-password">رمز عبور *</label>
                                        <input type="password" class="form-control" id="register-password"
                                               name="register-password" required>
                                    </div><!-- End .form-group -->
                                    
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ثبت نام</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>
                                        
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy"
                                                   required>
                                            <label class="custom-control-label" for="register-policy">با
                                                <a href="#">قوانین و مقررات </a>موافقم *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">یا عضویت با</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                حساب گوگل
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                حساب فیسبوک
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

{{--<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
    <div class="col-10">
        <div class="row no-gutters bg-white newsletter-popup-content">
            <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                <div class="banner-content text-center">
                    <img src="{{ asset('public-storefront/images/popup/newsletter/logo.png') }}" class="logo" alt="logo" width="60"
                         height="15">
                    <h2 class="banner-title">دریافت <span>25<light>%</light></span> تخفیف</h2>
                    <p>با عضویت در خبرنامه فروشگاه ما، یک تخفیف 25 درصدی دریافت کنید و از جدیدترین تخفیف ها مطلع
                        شوید</p>
                    <form action="#">
                        <div class="input-group input-group-round">
                            <input type="email" class="form-control form-control-white" placeholder="ایمیل شما"
                                   aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn" type="submit"><span>تایید</span></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                        <label class="custom-control-label" for="register-policy-2">این پنجره را دوباره
                            نشان نده</label>
                    </div><!-- End .custom-checkbox -->
                </div>
            </div>
            <div class="col-xl-2-5col col-lg-5 ">
                <img src="{{ asset('public-storefront/images/popup/newsletter/img-1.jpg') }}" class="newsletter-img" alt="newsletter">
            </div>
        </div>
    </div>
</div>
</div>--}}


<script src="{{ asset('public-storefront/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/jquery.hoverIntent.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/superfish.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/ckeditor5-35.4.0_editor/build/ckeditor.js') }}"></script>
<script src="{{ asset('public-storefront/js/aos/aos.js') }}"></script>
<script src="{{ asset('public-storefront/js/vanilla-tilt/vanilla-tilt.min.js') }}"></script>
<script src="{{ asset('public-storefront/js/main.js') }}"></script>
<script src="{{ asset('public-storefront/js/theme.js') }}"></script>

{{--@vite('resources/js/app.js')--}}

<script defer>
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        
        
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 0, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 400, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom' // defines which position of the element regarding window should trigger the animation
    });
</script>
</body>
</html>
