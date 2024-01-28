<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
            <div class="nav-wrapper">
                <ul class="navbar-list right">
                    <li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0)" data-target="translation-dropdown"><span class="fi fi-gb"></span></a></li>
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="mdi mdi-overscan"></i></a></li>
                    {{--                    <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="mdi mdi-magnify"></i></a></li>--}}
                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="mdi mdi-bell-outline"><small class="notification-badge">5</small></i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{ asset('public-admin/images/avatar/avatar-7.png') }}" alt="avatar"><i></i></span></a></li>
                    <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="javascript:void(0)" data-target="slide-out-right"><i class="mdi mdi-format-indent-increase"></i></a></li>
                </ul>
                <!-- translation-button-->
                <ul class="dropdown-content" id="translation-dropdown">
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="javascript:void(0)" data-language="en"><i class="fi fi-gb"></i>English</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="javascript:void(0)" data-language="es"><i class="fi fi-es"></i>Spain</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="javascript:void(0)" data-language="ir"><i class="fi fi-ir"></i>فارسی</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="javascript:void(0)" data-language="sa"><i class="fi fi-sa"></i>عربي</a></li>
                    <li class="dropdown-item"><a class="grey-text text-darken-1" href="javascript:void(0)" data-language="cn"><i class="fi fi-cn"></i>中国人</a></li>
                </ul>
                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>اطلاعیه‌ها<span class="new badge">5</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="javascript:void(0)"><span class="mdi mdi-cart-plus icon-bg-circle cyan small"></span>سفارش جدیدی ثبت شده است!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 ساعت پیش</time>
                    </li>
                    <li><a class="black-text" href="javascript:void(0)"><span class="mdi mdi-star icon-bg-circle red small"></span> وظیفه انجام شد</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 روز پیش</time>
                    </li>
                    <li><a class="black-text" href="javascript:void(0)"><span class="mdi mdi-power-settings icon-bg-circle teal small"></span> تنظیمات به‌روز رسانی شد</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 روز پیش</time>
                    </li>
                    <li><a class="black-text" href="javascript:void(0)"><span class="mdi mdi-calendar-today icon-bg-circle deep-orange small"></span> جلسه مدیریت شروع شده است</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 روز پیش</time>
                    </li>
                    <li><a class="black-text" href="javascript:void(0)"><span class="mdi mdi-trending-up icon-bg-circle amber small"></span> تولید گزارش ماهانه</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 هفته پیش</time>
                    </li>
                </ul>
                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href=""><i class="mdi mdi-account-outline"></i> پروفایل</a></li>
                    <li><a class="grey-text text-darken-1" href=""><i class="mdi mdi-message-outline"></i> چت</a></li>
                    <li><a class="grey-text text-darken-1" href=""><i class="mdi mdi-help-circle-outline"></i> راهنما</a></li>
                    <li class="divider"></li>
                    <li><a class="grey-text text-darken-1" href=""><i class="mdi mdi-lock-outline"></i> قفل</a></li>
                    <li><a class="grey-text text-darken-1" href=""><i class="mdi mdi-exit-to-app"></i> خروج</a></li>
                </ul>
            </div>
            {{--<nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="کاوش در متریالایز" data-search="template-list">
                            <label class="label-icon" for="search"><i class="mdi mdi-magnify search-sm-icon"></i></label><i class="mdi mdi-window-close search-sm-close"></i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>--}}
        </nav>
    </div>
</header>