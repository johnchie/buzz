<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <title>what's on png</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="{{ URL::asset('public/website/images/favicon.ico') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/website/css/swiper.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('public/website/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/website/css/vendor/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/website/css/vendor/owl.theme.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/website/css/vendor/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('public/website/css/responsive.css') }}">
        <script src="{{ URL::asset('public/website/js/vendor/modernizr.min.js') }}"></script>
        <!--[if IE 9]>
                <link rel="stylesheet" href="css/ie.css">
        <![endif]-->
        <style>
            .share_container{
                position: relative;
            }
            .small_popup{
                z-index: 999999 !important;
                padding: 5px;
                box-shadow: 1px 1px 1px #000;
                display: none;
                position: absolute;
                left: 20px;
                width: 150px;
                top: -35px;
                background-color: #9a1818;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <header id="header">
                <div class="wrap"> <a href="{{URL('')}}" id="logo" title="what's on png"><img src="{{ URL::asset('public/website/images/logo.png') }}" alt=""></a>
                    <div class="rightpart">
                        <div class="download-app">
                            <ul>
                                <li>Download Our App</li>
                                <?php
                                $app_link = \DB::table("cms")->whereIn("page", array("android_app", "ios_app"))->get();
                                $link_array = array();
                                foreach ($app_link as $value) {
                                    $link_array[$value->page] = $value->data;
                                }
                                ?>
                                <li><a href="{{$link_array['android_app']}}" title="" target="_blank"><img src="{{ URL::asset('public/website/images/app-store.png') }}" alt=""></a></li>
                                <li><a href="{{$link_array['ios_app']}}" title="" target="_blank"><img src="{{ URL::asset('public/website/images/gplay-store.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <nav id="mainmenu">
                            <ul>
                                <li class="{{ Request::is( '/' ) || Request::is( 'home' ) ? 'active' : '' }}"><a href="{{ Request::is( '/' ) || Request::is( 'home' ) ? '#home' : route('home') }}" title="Home">Home</a></li>
                                <li><a href="{{ Request::is( '/' ) || Request::is( 'home' ) ? '#topevents' : route('home') .'#topevents' }}" title="Top Events">Top Events</a></li>
                                <li><a href="{{ Request::is( '/' ) || Request::is( 'home' ) ? '#events' : route('home') .'#events' }}" title="Events">Events</a></li>
                                <li class="{{ Request::is( 'occations' ) ? 'active' : '' }}"><a href="#" onclick="javascript:location.href ='{{route("occations")}}'" title="Occasions">Occasions</a></li>
                                @if(!Session::has('U_ID'))
                                <li class="{{ Request::is( 'advertiser' ) ? 'active' : '' }}"><a href="#" onclick="javascript:location.href ='{{route("advlist")}}'" title="Advertisers">Advertisers</a></li>
                                @endif
                                <li class="{{ Request::is( 'contactus' ) ? 'active' : '' }}"><a href="#" onclick="javascript:location.href ='{{route("contactus")}}'" title="Contact us">Contact us</a></li>
                                @if(!Session::has('U_ID'))
                                <li id="login_click"><a href="javascript:void(0)" class="poptrigger" data-rel="login" title="Sign in">Sign in</a></li>
                                @else
                                <li class="afterlogin">
                                    <a href="javascript:void(0)" title="Sign in">
                                        <img src="{{ URL::asset('public/website/images/user.png') }}" alt="My Account">
                                    </a>
                                    <ul>
                                        <li><a href="{{route("favourites")}}" title="Favourites">Favourites</a></li>
                                        <li><a href="{{route("account")}}" title="Account">Account</a></li>
                                        <li><a href="{{route("manage-categories")}}" title="Manage Categories">Manage Categories</a></li>
                                        <li><a href="{{route("change-password")}}" title="Change Password">Change Password</a></li>
                                        <li><a href="{{route("logout")}}" title="Logout">Logout</a></li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                            <div class="search-box"> 
                                <form action="{{route("search")}}" id="search_form" method="get">
                                    <a href="#" class="search" title="search"><img src="{{ URL::asset('public/website/images/search.png') }}" alt=""></a> 
                                    <div class="search-filters">
<!--                                        <div class="check-box">
                                            <ul>
                                                <li><input type="radio" name="f" id="all" checked><label for="all">All</label></li>
                                                <li><input type="radio" name="f" id="today"><label for="today">Today</label></li>
                                                <li><input type="radio" name="f" id="tomorrow"><label for="tomorrow">Tomorrow</label></li>
                                                <li><input type="radio" name="f" id="thisweek"><label for="thisweek">This Week</label></li>
                                            </ul>
                                        </div>/.check-box -->
                                        <div class="filter-box">
                                            <ul class="date-picker">
                                                <li> <input type="text" name="sd" class="datepicker" placeholder="Start Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                                <li> <input type="text" name="ed" class="datepicker" placeholder="End Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                            </ul><!--/.date-picker -->
                                            <div class="select-box">
                                                <div class="custom-select">
                                                    <select name="c">
                                                        <option value="">Select Event Type</option>
                                                        <?php
                                                        $category_list = \App\Category::get();
                                                        foreach ($category_list as $list) {
                                                            echo "<option value='" . $list->id . "'>" . $list->name . "</option>";
                                                        }
                                                        ?>
                                                    </select><!--/.select -->
                                                </div><!--/.custom-select -->
                                            </div><!--/.select-box -->
                                            <div class="search-filter">
                                                <input type="search" name="q" placeholder="Search for Events" />
                                                <input type="button" onclick="jQuery('#search_form').submit()">
                                            </div><!--/.search-filter -->
                                        </div>
                                    </div><!--/.search-filters -->
                                </form>
                            </div>
                            <!--/.search-box --> 
                        </nav><!--/#mainmenu--> 
                    </div><!--/.rightpart --> 
                </div><!--/.wrap--> 
            </header><!--/#header-->
@if (session('failure'))
            <div class="alert alert-info">
                {{ session('failure') }}
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
