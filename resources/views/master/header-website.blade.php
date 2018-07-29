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
    </head>
    <body>
        <div id="wrapper">
            <header id="header">
                <div class="wrap"> <a href="{{URL('')}}" id="logo" title="what's on png"><img src="{{ URL::asset('public/website/images/logo.png') }}" alt=""></a>
                    <div class="rightpart">
                        <div class="download-app">
                            <ul>
                                <li>Download Our App</li>
                                <li><a href="#" title="" target="_blank"><img src="{{ URL::asset('public/website/images/app-store.png') }}" alt=""></a></li>
                                <li><a href="#" title="" target="_blank"><img src="{{ URL::asset('public/website/images/gplay-store.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                        <nav id="mainmenu">
                            <ul>
                                <li class="active"><a href="#home" title="Home">Home</a></li>
                                <li><a href="#topevents" title="Top Events">Top Events</a></li>
                                <li><a href="#events" title="Events">Events</a></li>
                                <li><a href="occasions.html" title="Occasions">Occasions</a></li>
                                <li><a href="advertisers.html" title="Advertisers">Advertisers</a></li>
                                <li><a href="contact-us.html" title="Contact us">Contact us</a></li>
                                <!--<li><a href="javascript:void(0)" class="poptrigger" data-rel="login" title="Sign in">Sign in</a></li>-->
                                <li class="afterlogin">
                                    <a href="javascript:void(0)" title="Sign in">
                                        <img src="{{ URL::asset('public/website/images/user.png') }}" alt="My Account">
                                    </a>
                                    <ul>
                                        <li><a href="{{route("favourites")}}" title="Favourites">Favourites</a></li>
                                        <li><a href="{{route("account")}}" title="Account">Account</a></li>
                                        <li><a href="manage-categories.html" title="Manage Categories">Manage Categories</a></li>
                                        <li><a href="change-password.html" title="Change Password">Change Password</a></li>
                                        <li><a href="#" title="Logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="search-box"> 
                                <a href="#" class="search" title="search"><img src="{{ URL::asset('public/website/images/search.png') }}" alt=""></a> 
                                <div class="search-filters">
                                    <div class="check-box">
                                        <ul>
                                            <li><input type="radio" name="filter" id="all" checked><label for="all">All</label></li>
                                            <li><input type="radio" name="filter" id="today"><label for="today">Today</label></li>
                                            <li><input type="radio" name="filter" id="tomorrow"><label for="tomorrow">Tomorrow</label></li>
                                            <li><input type="radio" name="filter" id="thisweek"><label for="thisweek">This Week</label></li>
                                        </ul>
                                    </div><!--/.check-box -->
                                    <div class="filter-box">
                                        <ul class="date-picker">
                                            <li> <input type="text" class="datepicker" placeholder="Start Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                            <li> <input type="text" class="datepicker" placeholder="End Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                        </ul><!--/.date-picker -->
                                        <div class="select-box">
                                            <div class="custom-select">
                                                <select>
                                                    <option>Select Event Type</option>
                                                    <option>ALL</option>
                                                    <option>COMEDY</option>
                                                    <option>CONFERENCES & WORKSHOPS</option>
                                                    <option>EXHIBITION & PERFORMANCES</option>
                                                    <option>FOOD & DRINK</option>
                                                    <option>MUSIC</option>
                                                    <option>TRAVEL & ACTIVITIES</option>
                                                    <option>SPLASH 2018</option>
                                                </select><!--/.select -->
                                            </div><!--/.custom-select -->
                                        </div><!--/.select-box -->
                                        <div class="search-filter">
                                            <input type="search" placeholder="Search for Events" />
                                            <input type="button" >
                                        </div><!--/.search-filter -->
                                    </div>
                                </div><!--/.search-filters -->
                            </div>
                            <!--/.search-box --> 
                        </nav><!--/#mainmenu--> 
                    </div><!--/.rightpart --> 
                </div><!--/.wrap--> 
            </header><!--/#header-->
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
            </head>
            <body>
                <div id="wrapper">
                    <header id="header">
                        <div class="wrap"> <a href="{{URL('')}}" id="logo" title="what's on png"><img src="{{ URL::asset('public/website/images/logo.png') }}" alt=""></a>
                            <div class="rightpart">
                                <div class="download-app">
                                    <ul>
                                        <li>Download Our App</li>
                                        <li><a href="#" title="" target="_blank"><img src="{{ URL::asset('public/website/images/app-store.png') }}" alt=""></a></li>
                                        <li><a href="#" title="" target="_blank"><img src="{{ URL::asset('public/website/images/gplay-store.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <nav id="mainmenu">
                                    <ul>
                                        <li class="active"><a href="#home" title="Home">Home</a></li>
                                        <li><a href="#topevents" title="Top Events">Top Events</a></li>
                                        <li><a href="#events" title="Events">Events</a></li>
                                        <li><a href="occasions.html" title="Occasions">Occasions</a></li>
                                        <li><a href="advertisers.html" title="Advertisers">Advertisers</a></li>
                                        <li><a href="contact-us.html" title="Contact us">Contact us</a></li>
                                        <li><a href="javascript:void(0)" class="poptrigger" data-rel="login" title="Sign in">Sign in</a></li>
                                    </ul>
                                    <div class="search-box"> 
                                        <a href="#" class="search" title="search"><img src="{{ URL::asset('public/website/images/search.png') }}" alt=""></a> 
                                        <div class="search-filters">
                                            <div class="check-box">
                                                <ul>
                                                    <li><input type="radio" name="filter" id="all" checked><label for="all">All</label></li>
                                                    <li><input type="radio" name="filter" id="today"><label for="today">Today</label></li>
                                                    <li><input type="radio" name="filter" id="tomorrow"><label for="tomorrow">Tomorrow</label></li>
                                                    <li><input type="radio" name="filter" id="thisweek"><label for="thisweek">This Week</label></li>
                                                </ul>
                                            </div><!--/.check-box -->
                                            <div class="filter-box">
                                                <ul class="date-picker">
                                                    <li> <input type="text" class="datepicker" placeholder="Start Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                                    <li> <input type="text" class="datepicker" placeholder="End Date" /> <span><img src="{{ URL::asset('public/website/images/calendar.png') }}" alt=""></span>  </li>
                                                </ul><!--/.date-picker -->
                                                <div class="select-box">
                                                    <div class="custom-select">
                                                        <select>
                                                            <option>Select Event Type</option>
                                                            <option>ALL</option>
                                                            <option>COMEDY</option>
                                                            <option>CONFERENCES & WORKSHOPS</option>
                                                            <option>EXHIBITION & PERFORMANCES</option>
                                                            <option>FOOD & DRINK</option>
                                                            <option>MUSIC</option>
                                                            <option>TRAVEL & ACTIVITIES</option>
                                                            <option>SPLASH 2018</option>
                                                        </select><!--/.select -->
                                                    </div><!--/.custom-select -->
                                                </div><!--/.select-box -->
                                                <div class="search-filter">
                                                    <input type="search" placeholder="Search for Events" />
                                                    <input type="button" >
                                                </div><!--/.search-filter -->
                                            </div>
                                        </div><!--/.search-filters -->
                                    </div>
                                    <!--/.search-box --> 
                                </nav><!--/#mainmenu--> 
                            </div><!--/.rightpart --> 
                        </div><!--/.wrap--> 
                    </header><!--/#header-->
                    @if (session('failure'))
                    <div class="alert alert-waring" style="background: red" >
                        {{ session('failure') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
