<!DOCTYPE html>
<html class="loading"
      lang="en"
      data-textdirection="rtl"
>
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=UTF-8"
    />
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"
    />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta
        name="description"
        content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google."
    />
    <meta
        name="keywords"
        content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard"
    />
    <meta name="author"
          content="ThemeSelect"
    />
    <title>احراز هویت</title>
    <link
        rel="apple-touch-icon"
        href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png"
    />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="../../../app-assets/images/favicon/favicon-32x32.png"
    />
    <link
        rel="stylesheet"
        href="{{ asset('public-admin/fonts/index.css') }}"
    >

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/vendors.min.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/style-rtl.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/materialize.css') }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/style.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/login.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/register.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/forgot.css') }}"
    />

    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('public-admin/authentication/css/custom.css') }}"
    />

    <style>
        .password-field {
            position: relative;
        }

        .password-field .force-show-password {
            position: absolute;
            left: 0;
            top: 2px;
            cursor: pointer;
            user-select: none;
            z-index: 1000;
        }
    </style>

    @yield('css')
</head>
<!-- END: Head-->

<body
    class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg blank-page blank-page"
    data-open="click"
    data-menu="vertical-modern-menu"
    data-col="1-column"
>
<div class="row">
    <div class="col s12">
        <div class="container">

            @yield('content')

        </div>
        <div class="content-overlay"></div>
    </div>
</div>


<script src="{{ asset('public-admin/authentication/js/vendors.min.js') }}"></script>
<script src="{{ asset('public-admin/authentication/js/plugins.js') }}"></script>
{{--<script src="{{ asset('public-admin/authentication/js/search.js') }}"></script>--}}
<script src="{{ asset('public-admin/authentication/js/custom-script.js') }}"></script>

<script type="text/javascript">
    $('#force-show-password').on('click', null, null, function () {
        let passwordFieldType, passwordField;

        if ('remove_red_eye' === $(this).text()) {
            $(this).text('visibility_off');
        } else if ('visibility_off' === $(this).text()) {
            $(this).text('remove_red_eye');
        }
        //
        passwordField = $('#password');
        passwordFieldType = passwordField.attr('type');

        if ('password' === passwordFieldType) {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });
</script>

@yield('js')

</body>
</html>
