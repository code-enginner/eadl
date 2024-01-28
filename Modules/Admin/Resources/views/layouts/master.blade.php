<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>فروشگاه | متریالایز - داشبورد ادمین متریالایز</title>

    <link rel="apple-touch-icon" href="{{ asset('public-admin/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public-admin/images/favicon/favicon-32x32.png') }}">

{{--    <link rel="stylesheet" href="{{ asset('public-admin/css/index.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('public-admin/fonts/index.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('public-admin/css/custom-styles.css') }}">--}}

</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


{{--<livewire:admin::header></livewire:admin::header>--}}


{{--<livewire:admin::menu></livewire:admin::menu>--}}


{{-- Main Start --}}
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">

                    @yield('content')

                </div>

{{--                <livewire:admin::setting></livewire:admin::setting>--}}

            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
{{-- Main End --}}


{{--<livewire:admin::footer></livewire:admin::footer>--}}


{{-- Vendors --}}
<script src="{{ asset('public-admin/js/vendors/jquery-3.6.3.min.js') }}"></script>
{{--<script src="{{ asset('public-admin/js/vendors/materialize.min.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/vendors.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/plugins.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/ckeditor5-35.4.0_editor/build/ckeditor.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/aos/aos.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/aos/aos-init.js') }}"></script>--}}
{{--<script src="{{ asset('public-admin/js/vendors/vanilla-tilt/vanilla-tilt.min.js') }}"></script>--}}

{{-- Custome Scripts --}}
{{--<script src="{{ asset('public-admin/js/custom-scripts') }}"></script>--}}

</body>
</html>
