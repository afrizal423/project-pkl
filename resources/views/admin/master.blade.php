<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta
            name="description"
            content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
        <meta
            name="keywords"
            content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
        <title>@yield('judul_halaman')</title>
        <!-- Favicons-->
        <link rel="icon" href="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png" sizes="32x32">
        <!-- Favicons-->
        <link
            rel="apple-touch-icon-precomposed"
            href="images/favicon/apple-touch-icon-152x152.png">
        <!-- For iPhone -->
        <meta name="msapplication-TileColor" content="#00bcd4">
        <meta
            name="msapplication-TileImage"
            content="images/favicon/mstile-144x144.png">
        <!-- For Windows Phone -->
        <!-- CORE CSS-->
        <link href="<?php echo asset('assets/admin/css/materialize.css')?>" type="text/css" rel="stylesheet">
        <link href="<?php echo asset('assets/admin/css//style.css')?>" type="text/css" rel="stylesheet">
        <!-- Custome CSS-->
        <link
            href="<?php echo asset('assets/admin/css/custom/custom.css')?>"
            type="text/css"
            rel="stylesheet">
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link
            href="<?php echo asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css')?>"
            type="text/css"
            rel="stylesheet">
        <link
            href="<?php echo asset('assets/admin/vendors/flag-icon/css/flag-icon.min.css')?>"
            type="text/css"
            rel="stylesheet">
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    </head>
    <body>
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->
        <!--
        //////////////////////////////////////////////////////////////////////////// -->
        <!-- START HEADER -->
        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="navbar-color gradient-45deg-light-blue-cyan">
                    <div class="nav-wrapper">
                        <ul class="left">
                            <li>
                                <h1 class="logo-wrapper">
                                    <a href="index.html" class="brand-logo darken-1">
                                        <img
                                            src="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png"
                                            alt="materialize logo">
                                        <span class="logo-text hide-on-med-and-down">Fasilkom</span>
                                    </a>
                                </h1>
                            </li>
                        </ul>
                        <div class="header-search-wrapper hide-on-med-and-down">
                            <i class="material-icons">search</i>
                            <input
                                type="text"
                                name="Search"
                                class="header-search-input z-depth-2"
                                placeholder="Search"/>
                        </div>
                        <ul class="right hide-on-med-and-down">
                            <!--<li>
                                <a
                                    href="javascript:void(0);"
                                    class="waves-effect waves-block waves-light translation-button"
                                    data-activates="translation-dropdown">
                                    <span class="flag-icon flag-icon-id"></span>
                                </a>
                            </li>-->
                            <li>
                                <a
                                    href="javascript:void(0);"
                                    class="waves-effect waves-block waves-light toggle-fullscreen">
                                    <i class="material-icons">settings_overscan</i>
                                </a>
                            </li>
                            <!--<li>
                                <a
                                    href="javascript:void(0);"
                                    class="waves-effect waves-block waves-light notification-button"
                                    data-activates="notifications-dropdown">
                                    <i class="material-icons">notifications_none
                                        <small class="notification-badge pink accent-2">5</small>
                                    </i>
                                </a>
                            </li>-->
                            <li>
                                <a
                                    href="javascript:void(0);"
                                    class="waves-effect waves-block waves-light profile-button"
                                    data-activates="profile-dropdown">
                                    <span class="avatar-status avatar-online">
                                        <img src="{{asset('storage/' . Auth::user()->avatar)}}" alt="avatar">
                                        <i></i>
                                    </span>
                                </a>
                            </li>
                            <!--<li>
                                <a
                                    href="#"
                                    data-activates="chat-out"
                                    class="waves-effect waves-block waves-light chat-collapse">
                                    <i class="material-icons">format_indent_increase</i>
                                </a>
                            </li>-->
                        </ul>
                        <!-- translation-button
                        <ul id="translation-dropdown" class="dropdown-content">
                            <li>
                                <a href="#!" class="grey-text text-darken-1">
                                    <i class="flag-icon flag-icon-gb"></i>
                                    English</a>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1">
                                    <i class="flag-icon flag-icon-id"></i>
                                    Indonesia</a>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1">
                                    <i class="flag-icon flag-icon-fr"></i>
                                    French</a>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1">
                                    <i class="flag-icon flag-icon-cn"></i>
                                    Chinese</a>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-1">
                                    <i class="flag-icon flag-icon-de"></i>
                                    German</a>
                            </li>
                        </ul>-->
                        <!-- notifications-dropdown
                        <ul id="notifications-dropdown" class="dropdown-content">
                            <li>
                                <h6>NOTIFICATIONS
                                    <span class="new badge">5</span>
                                </h6>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#!" class="grey-text text-darken-2">
                                    <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
                                    A new order has been placed!</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-2">
                                    <span class="material-icons icon-bg-circle red small">stars</span>
                                    Completed the task</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-2">
                                    <span class="material-icons icon-bg-circle teal small">settings</span>
                                    Settings updated</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-2">
                                    <span class="material-icons icon-bg-circle deep-orange small">today</span>
                                    Director meeting started</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                            </li>
                            <li>
                                <a href="#!" class="grey-text text-darken-2">
                                    <span class="material-icons icon-bg-circle amber small">trending_up</span>
                                    Generate monthly report</a>
                                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                            </li>
                        </ul>-->
                        <!-- profile-dropdown -->
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li>
                                <a href="{{url('admin/profile')}}" class="grey-text text-darken-1">
                                    <i class="material-icons">face</i>
                                    Profile</a>
                            </li>
                            <!--<li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">settings</i>
                                    Settings</a>
                            </li>
                            <li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">live_help</i>
                                    Help</a>
                            </li>-->
                            <li class="divider"></li>
                            <!--<li>
                                <a href="#" class="grey-text text-darken-1">
                                    <i class="material-icons">lock_outline</i>
                                    Lock</a>
                            </li>-->
                            <li>
                                <a
                                    class="grey-text text-darken-1"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                    <i class="material-icons">keyboard_tab</i>
                                    {{ __('Logout') }}</a>
                                <form
                                    id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end header nav-->
        </header>
        <!-- END HEADER -->
        <!--
        //////////////////////////////////////////////////////////////////////////// -->
        <!-- START MAIN -->
        <div id="main">
            <!-- START WRAPPER -->
            <div class="wrapper">
                <!-- START LEFT SIDEBAR NAV-->
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img
                                        src="{{asset('storage/' . Auth::user()->avatar)}}"
                                        alt=""
                                        class="circle responsive-img valign profile-image cyan">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <ul id="profile-dropdown-nav" class="dropdown-content">
                                        <li>
                                            <a href="{{url('admin/profile')}}" class="grey-text text-darken-1">
                                                <i class="material-icons">face</i>
                                                Profile</a>
                                        </li>
                                       <!-- <li>
                                            <a href="#" class="grey-text text-darken-1">
                                                <i class="material-icons">settings</i>
                                                Settings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="grey-text text-darken-1">
                                                <i class="material-icons">live_help</i>
                                                Help</a>
                                        </li>-->
                                        <li class="divider"></li>
                                        <!--<li>
                                            <a href="#" class="grey-text text-darken-1">
                                                <i class="material-icons">lock_outline</i>
                                                Lock</a>
                                        </li>-->
                                        <li>
                                            <a
                                                class="grey-text text-darken-1"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                                <i class="material-icons">keyboard_tab</i>
                                                {{ __('Logout') }}</a>
                                            <form
                                                id="logout-form"
                                                action="{{ route('logout') }}"
                                                method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                    <a
                                        class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                                        href="#"
                                        style="font-size:;"
                                        data-activates="profile-dropdown-nav">{{ Auth::user()->username }}
                                        <i class="mdi-navigation-arrow-drop-down right"></i>
                                    </a>
                                    <p class="user-roal">Administrator</p>
                                </div>
                            </div>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible" data-collapsible="accordion">
                                <li class="bold">
                                    <a href="index.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">pie_chart_outlined</i>
                                        <span class="nav-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">account_circle</i>
                                        <span class="nav-text">User Management</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="{{url('admin/mahasiswa')}}" class="waves-effect waves-cyan">
                                        <i class="material-icons">person</i>
                                        <span class="nav-text">Data Mahasiswa</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="{{url('admin/pengumuman')}}" class="waves-effect waves-cyan">
                                        <i class="material-icons">announcement</i>
                                        <span class="nav-text">Pengumuman</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="{{url('admin/event')}}" class="waves-effect waves-cyan">
                                        <i class="material-icons">cake</i>
                                        <span class="nav-text">Event</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">group</i>
                                        <span class="nav-text">Ormawa</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">list</i>
                                        <span class="nav-text">PKL</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">local_activity</i>
                                        <span class="nav-text">Magang</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">mood</i>
                                        <span class="nav-text">Tugas Akhir</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="{{url('admin/prestasi')}}" class="waves-effect waves-cyan">
                                        <i class="material-icons">person</i>
                                        <span class="nav-text">Prestasi</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a href="admin.html" class="waves-effect waves-cyan">
                                        <i class="material-icons">group</i>
                                        <span class="nav-text">Alumni</span>
                                    </a>
                                </li>
                                <li class="bold">
                                    <a class="collapsible-header  waves-effect waves-cyan">
                                    <i class="material-icons">chrome_reader_mode</i>Surat</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li>
                                                <a href="#">Surat Beasiswa</a>
                                            </li>
                                            <li>
                                                <a href="#">Surat Ijin</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="bold">
                                    <ul class="collapsible">
                                        <li>
                                            <div class="collapsible-header">
                                                <i class="material-icons">filter_drama</i>First</div>
                                            <div class="collapsible-body">
                                                <span>Lorem ipsum dolor sit amet.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header">
                                                <i class="material-icons">place</i>Second</div>
                                            <div class="collapsible-body">
                                                <span>Lorem ipsum dolor sit amet.</span></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header">
                                                <i class="material-icons">whatshot</i>Third</div>
                                            <div class="collapsible-body">
                                                <span>Lorem ipsum dolor sit amet.</span></div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                    </ul>
                    <a
                        href="#"
                        data-activates="slide-out"
                        class="orange darken-3 sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
                        <i class="material-icons">menu</i>
                    </a>
                </aside>
                <!-- END LEFT SIDEBAR NAV-->
                <!--
                //////////////////////////////////////////////////////////////////////////// -->
                @yield('konten')

                <!-- START RIGHT SIDEBAR NAV-->
                <aside id="right-sidebar-nav">
                    <ul id="chat-out" class="side-nav rightside-navigation">
                        <li class="li-hover">
                            <div class="row">
                                <div class="col s12 border-bottom-1 mt-5">
                                    <ul class="tabs">
                                        <li class="tab col s4">
                                            <a href="#activity" class="active">
                                                <span class="material-icons">graphic_eq</span>
                                            </a>
                                        </li>
                                        <li class="tab col s4">
                                            <a href="#chatapp">
                                                <span class="material-icons">face</span>
                                            </a>
                                        </li>
                                        <li class="tab col s4">
                                            <a href="#settings">
                                                <span class="material-icons">settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="settings" class="col s12">
                                    <h6 class="mt-5 mb-3 ml-3">GENERAL SETTINGS</h6>
                                    <ul class="collection border-none">
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Notifications</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input checked="checked" type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Show recent activity</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input checked="checked" type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                        </li>
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Notifications</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Show recent activity</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                        </li>
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Show your emails</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li class="collection-item border-none">
                                            <div class="m-0">
                                                <span class="font-weight-600">Show Task statistics</span>
                                                <div class="switch right">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="lever"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                                        </li>
                                    </ul>
                                </div>
                                <div id="chatapp" class="col s12">
                                    <div class="collection border-none">
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img src="assets/admin/images/avatar/avatar-1.png" alt="" class="circle cyan">
                                            <span class="line-height-0">Humaira Yuliarti
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Thank you
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img
                                                src="assets/admin/images/avatar/avatar-2.png"
                                                alt=""
                                                class="circle deep-orange accent-2">
                                            <span class="line-height-0">Asman Prasetya
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">4.14 AM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Hello Bro
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img
                                                src="assets/admin/images/avatar/avatar-5.png"
                                                alt=""
                                                class="circle red accent-2">
                                            <span class="line-height-0">Citra Pertiwi
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">5.15 PM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Love you
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img src="assets/admin/images/avatar/avatar-7.png" alt="" class="circle cyan">
                                            <span class="line-height-0">Jaka Sinaga
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">9.53 PM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Great!
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img src="assets/admin/images/avatar/avatar-1.png" alt="" class="circle cyan">
                                            <span class="line-height-0">Adiarja Gunawan
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">4.34 AM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Like you
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img
                                                src="assets/admin/images/avatar/avatar-2.png"
                                                alt=""
                                                class="circle red accent-2">
                                            <span class="line-height-0">Daniel Russell
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">12.00 AM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Thank you
                                            </p>
                                        </a>
                                        <a href="#!" class="collection-item avatar border-none">
                                            <img
                                                src="assets/admin/images/avatar/avatar-3.png"
                                                alt=""
                                                class="circle teal accent-4">
                                            <span class="line-height-0">Sarah Graves
                                            </span>
                                            <span class="medium-small right blue-grey-text text-lighten-3">11.14 PM</span>
                                            <p class="medium-small blue-grey-text text-lighten-3">Okay
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div id="activity" class="col s12">
                                    <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
                                    <div class="activity">
                                        <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                            <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#" class="deep-purple-text medium-small">just now</a>
                                            <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Adiarja Gunawan Purchased new equipments for zonal office.</p>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row mb-0">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                                <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="cyan-text medium-small">Yesterday</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for Surakarta-ID will be on 18th August 2019.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row mb-0">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                                <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="green-text medium-small">5 Days Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Asman Prasetya Send you a voice mail for next conference.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row mb-0">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                                <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="amber-text medium-small">1 Week Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Citra Pertiwi open a new store at Malang.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list row">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                                <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row mb-0">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                                                <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="brown-text medium-small">1 Month Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Asman Prasetya Send you a voice mail for next conference.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list chat-out-list row mb-0">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                                <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Citra Pertiwi open a new store at S.G Road.</p>
                                            </div>
                                        </div>
                                        <div class="recent-activity-list row">
                                            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                                                <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                                            </div>
                                            <div class="col s9 recent-activity-list-text">
                                                <a href="#" class="grey-text medium-small">1 Year Ago</a>
                                                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </aside>
                <!-- END RIGHT SIDEBAR NAV-->
            </div>
            <!-- END WRAPPER -->
        </div>
        <!-- END MAIN -->
        <!--
        //////////////////////////////////////////////////////////////////////////// -->
        <!-- START FOOTER -->
        <footer class="page-footer gradient-45deg-light-blue-cyan">
            <div class="footer-copyright">
                <div class="container">
                    <span>Copyright ©
                        <script type="text/javascript">
                            document.write(new Date().getFullYear());
                        </script>
                        <a
                            class="grey-text text-lighten-2"
                            href="http://github.com/afrizal423"
                            target="_blank">Tim PKL</a>
                    </span>
                    <span class="right hide-on-small-only">
                        Special Thanks to
                        <a
                            class="grey-text text-lighten-2"
                            href="https://pixinvent.com/"
                            target="_blank">PIXINVENT</a>
                    </span>
                </div>
            </div>
        </footer>

        <!-- END FOOTER -->
        <!-- ================================================ Scripts
        ================================================ -->
        <script>
            var editor_config = {
                path_absolute: "/",
                selector: "textarea.my-editor",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter align" +
                        "right alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback: function (field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName(
                            'body'
                        )[0]
                        .clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName(
                            'body'
                        )[0]
                        .clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' +
                            field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE
                        .activeEditor
                        .windowManager
                        .open({
                            file: cmsURL,
                            title: 'Filemanager',
                            width: x * 0.8,
                            height: y * 0.8,
                            resizable: "yes",
                            close_previous: "no"
                        });
                }
            };

            tinymce.init(editor_config);
        </script>
        <!-- jQuery Library -->
        <script type="text/javascript" src="<?php echo asset('assets/admin/vendors/jquery-3.2.1.min.js')?>"></script>
        <!--materialize js-->
        <script type="text/javascript" src="<?php echo asset('assets/admin/js/materialize.min.js')?>"></script>
        <!--scrollbar-->
        <script
            type="text/javascript"
            src="<?php echo asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="<?php echo asset('assets/admin/js/plugins.js')?>"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="<?php echo asset('assets/admin/js/custom-script.js')?>"></script>
        <script>

            $(document).ready(function(){
              $('.modal').modal();
            });
                  </script>
    </body>
</html>
