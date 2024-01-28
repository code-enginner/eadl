<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"
    >
    <meta http-equiv="Content-Type"
          content="text/html; charset=UTF-8"
    >
    <meta name="description"
          content="sina mohammadi web application developer at arka binesh"
    >
    <meta name="keywords"
          content="arka, sina  mohammadi, arka binesh"
    >
    <meta name="author"
          content="ThemeSelect"
    >
    <title>داشبورد مدیر</title>

    <link rel="stylesheet"
          href="{{ asset('public-admin/fonts/index.css') }}"
    >

    @vite(['resources/css/app.css'])

    {{--    @yield('css')--}}

    <style>
        ._active {
            background: rgb(156 163 175 / 0.3) !important;
            /*background: rgb(156 163 175 / 0.3) !important;*/
            /*background: rgb(241 245 249) !important;*/
        }
    </style>

</head>
<body class="text-[0.8rem] text-right">

<div id="body-cover"
     class="hidden opacity-0 absolute top-0 left-0 w-full h-full bg-black/75 z-[1000] transition-opacity ease-in-out duration-200"
></div>


@include('dashboard::dashboard.header')

@include('dashboard::dashboard.menu')


<main class="py-2 pl-2 pr-2 mb-[6rem] 2xl:pr-[15.5rem] xl:pr-[15.5rem] lg:pr-[15.5rem] mt-[1rem] transition-all duration-200">

    @yield('content')

</main>


@include('dashboard::dashboard.footer')


@vite(['resources/js/app.js'])

<script type="module" src="{{ asset('public-admin/js/admin-panel.js') }}"></script>
<script src="{{ asset('public-admin/js/vendors/ckeditor5-35.4.0_editor/build/ckeditor.js') }}"></script>
@yield('js')
</body>
</html>
