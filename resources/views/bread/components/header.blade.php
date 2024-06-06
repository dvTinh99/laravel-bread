<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/animate.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/huong-style.css') }}">
</head>

<body>

    <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="pull-left auto-width-left">
                    <ul class="top-menu menu-beta l-inline">
                        <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                        <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                    </ul>
                </div>
                <div class="pull-right auto-width-right">
                    <ul class="top-details menu-beta l-inline">
                        @if (Auth::check())
                            <li><a href="#"><i class="fa fa-user"></i>{{ Auth::user()->full_name }}</a></li>
                            <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                            <li><a href="{{ route('register') }}">Đăng kí</a></li>
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-top -->
        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="{{ route('home') }}" id="logo"><img src="{{ asset('assets/dest/images/logo-cake.png') }}" width="200px"
                            alt=""></a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <div class="space10">&nbsp;</div>
                    <div class="beta-comp">
                        <form role="search" method="get" id="searchform" action="/">
                            <input type="text" value="" name="s" id="s"
                                placeholder="Nhập từ khóa..." />
                            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                        </form>
                    </div>

                    <div class="beta-comp">
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{ count(Session::get('cart') ?? [])}}) <i
                                    class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">

                                @if(Session::has('cart'))
                                @php
                                    $totalPrice = 0;
                                @endphp
                                    @foreach (Session::get('cart') as $item)
                                        @php
                                            $totalPrice += $item['unit_price'] * $item['quantity'] ?? 0;
                                        @endphp
                                        <div class="cart-item">
                                            <div class="media">
                                                <a class="pull-left" href="#"><img
                                                        src="{{ asset('/image/product/' . $item['image']) }}" alt=""></a>
                                                <div class="media-body" style="width: 70%">
                                                    <span class="cart-item-title">{{ $item['name'] }}</span>
                                                    {{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
                                                    <span class="cart-item-amount">{{ $item['quantity'] }} *<span>{{ $item['unit_price'] ?? 0 }}</span></span>
                                                </div>
                                                <div class="pull-right" >
                                                    <a href="{{ route('cart-remove', $item['id'] ?? 0) }}" style="color: red;font-weight: bold;">X</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                Trống
                                @endif


                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span
                                            class="cart-total-value">{{  $totalPrice ?? 0 }}</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{ route('checkout') }}" class="beta-btn primary text-center">Đặt hàng <i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-body -->
        <div class="header-bottom" style="background-color: #0277b8;">
            <div class="container">
                <a class="visible-xs beta-menu-toggle pull-right" href="#"><span
                        class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li><a href="product_type.html">Sản phẩm 1</a></li>
                                <li><a href="product_type.html">Sản phẩm 2</a></li>
                                <li><a href="product_type.html">Sản phẩm 4</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->
