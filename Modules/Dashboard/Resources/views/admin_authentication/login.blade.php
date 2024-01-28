@extends('dashboard::layouts.auth_master')

@section('css')
    <style>
        #login-tabs {
            background-color: transparent !important;
        }

        #type1, #type2 {
            margin-top: 12px;
        }

        .preloader-wrapper.small {
            width: 25px !important;
            height: 25px !important;
        }

        #circle-clipper {
            margin-top: 5px;
        }
    </style>
@stop

@section('content')

    <div id="login-page"
         class="row"
    >
        <div
            class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8"
        >


            <div class="row">
                <div class="input-field col s12">
                    <h5 class="ml-4">ورود مدیر</h5>
                </div>
            </div>


            <div class="row">
                <div class="col s12">
                    <ul class="tabs"
                        id="login-tabs"
                    >
                        <li class="tab col m6"><a href="#type1" class="active">ورود با رمز عبور</a></li>
                        <li class="tab col m6"><a href="#type2"
                            >ورود با کد یکبار مصرف</a></li>
                    </ul>
                </div>

                <div id="type1"
                     class="col s12"
                >
                    <form id="login-form-validation-type1"
                          class="login-form"
                          method="POST"
                          action="{{ route('admin.auth.login.process') }}"
                    >
                        @csrf

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="username"
                                       class="validate"
                                       type="text"
                                       name="username"
                                       required
                                       value="{{ old('username') }}"
                                />
                                <label for="username"
                                       class="center-align"
                                >ایمیل یا شماره همراه</label
                                >
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12 password-field">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input id="password"
                                       class="validate"
                                       type="password"
                                       name="password"
                                       maxlength="22"
                                       required
                                />
                                <i class="material-icons prefix pt-2 force-show-password"
                                   id="force-show-password"
                                >remove_red_eye</i>
                                <label for="password">رمز عبور</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 ml-3 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox"
                                               name="remember_me"
                                               id="pass-code-remember-me"
                                               value="{{ old('remember_me') }}"
                                        />
                                        <span>مرا به خاطر بسپار</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button
                                    class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"
                                    type="submit"
                                > وارد شدن
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

                <div id="type2"
                     class="col s12"
                >
                    <form id="login-form-validation-type2"
                          class="login-form"
                          method="POST"
                          action="{{ route('admin.auth.otp.login.process') }}"
                    >
                        @csrf

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="mobile"
                                       class="validate"
                                       type="text"
                                       name="mobile"
                                       maxlength="11"
                                       required
                                       value="{{ old('mobile') }}"
                                />
                                <label for="mobile"
                                       class="center-align"
                                > شماره همراه</label
                                >
                            </div>

                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">vpn_key</i>
                                <input id="otp-code"
                                       class="validate"
                                       type="text"
                                       name="otpCode"
                                       maxlength="6"
                                       required
                                       disabled
                                />
                                <label for="otp-code"
                                       class="center-align"
                                > کد یکبار مصرف</label
                                >
                            </div>


                            <div class="input-field col s6">
                                <button
                                    class="btn waves-effect waves-light col s12"
                                    id="btn-get-login-otp-code"
                                    type="button"
                                    onclick="otpCodeRequest()"
                                > ارسال کد
                                </button>
                            </div>

                            <div class="input-field col s6">
                                <button
                                    class="btn waves-effect waves-light col s12"
                                    id="btn-check-login-otp-code"
                                    type="submit"
                                    disabled
                                    onclick="btnDisable(this)"
                                > تایید کد
                                </button>
                            </div>


                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox"
                                               name="remember_me"
                                               id="otp-remember-me"
                                               value="{{ old('remember_me') }}"
                                        />
                                        <span>مرا به خاطر بسپار</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>




            <div class="row">
                <div class="input-field col s6 m6 l6">
                    {{--<p class="margin medium-small">
                        <a href="{{ route('admin.auth.register') }}">الان ثبت نام کنید!</a>
                    </p>--}}
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small">
                        <a href="{{ route('admin.auth.forgot-password') }}"
                        >رمز خود را فراموش کردید؟</a
                        >
                    </p>
                </div>
            </div>


        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        let toastHTMLs = [];

        @if($errors->any())
        @foreach($errors->all() as $error)
        toastHTMLs.push('<span style="font-size: 14px">{{ $error }}</span>');
        @endforeach
            @endif

        if (0 < toastHTMLs.length) {
            toastHTMLs.map(error => {
                M.toast({
                    html: error,
                    classes: 'red',
                    activationPercent: 0.5,
                    outDuration: 400,
                    inDuration: 350,
                    displayLength: 3000
                });
            });
        }
    </script>

    <script>
        let circleLoader = `<div id="circle-clipper" class="preloader-wrapper small active">
                                    <div class="spinner-layer spinner-green-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div><div class="gap-patch">
                                            <div class="circle"></div>
                                        </div><div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>`;


        function otpCodeRequest() {
            let btn_get_login_otp_code = $('#btn-get-login-otp-code');
            let btn_check_login_otp_code = $('#btn-check-login-otp-code');
            let otp_code_input = $('#otp-code');
            let mobile = $('#mobile');


            if (!mobile.val()) {
                mobile.focus();
                //
                M.toast({
                    html: `<span style="font-size: 14px">شماره همراه الزامی است</span>`,
                    classes: 'red',
                    activationPercent: 0.5,
                    outDuration: 400,
                    inDuration: 350,
                    displayLength: 3000
                });

                return false;
            }

            $.ajaxSetup({
                headers: {
                    'ADMIN-MOBILE': `${mobile.val()}`
                }
            });

            $.ajax({
                url: '{{ route('admin.auth.login.get.otp') }}',
                type: 'GET',

                beforeSend: function () {
                    btn_get_login_otp_code.html(circleLoader);
                    btn_get_login_otp_code.attr('disabled', true);
                },

                success: function (result, status, xhr) {
                    //todo show timer in the "btn_get_login_otp_code"

                    btn_check_login_otp_code.attr('disabled', false);
                    otp_code_input.attr('disabled', false);
                    btn_get_login_otp_code.empty().text('ارسال کد');
                    //
                    autoChangeStatusActivity(btn_get_login_otp_code, btn_check_login_otp_code, otp_code_input);
                    //
                    M.toast({
                        html: `<span style="font-size: 14px">${result}</span>`,
                        classes: 'green',
                        position: "topLeft",
                        activationPercent: 0.5,
                        outDuration: 400,
                        inDuration: 350,
                        displayLength: 3000
                    });
                },

                error: function (xhr, status, error) {
                    btn_get_login_otp_code.empty().text('ارسال کد').attr('disabled', false);
                    btn_check_login_otp_code.attr('disabled', true);
                    otp_code_input.attr('disabled', true);
                    //
                    M.toast({
                        html: `<span style="font-size: 14px">${xhr.responseJSON.message}</span>`,
                        classes: 'red',
                        activationPercent: 0.5,
                        outDuration: 400,
                        inDuration: 350,
                        displayLength: 3000
                    });
                }
            })
        }

        function autoChangeStatusActivity(btn_get_login_otp_code, btn_check_login_otp_code, otp_code_input) {
            return setTimeout(() => {
                btn_get_login_otp_code.attr('disabled', false);
                btn_check_login_otp_code.attr('disabled', true);
                otp_code_input.attr('disabled', true).val(null);
            }, 120000);
        }

        function btnDisable(btn) {
            if (!checkOtpCode()) {
                return false;
            }
            //
            $(btn).attr('disabled', true);
            $('#otp-remember-me').attr('disabled', true);
        }

        function checkOtpCode() {
            if ( !$('#btn-check-login-otp-code').val() ) {
                $('#login-form-validation-type2').preventDefault(); //or return false to prevent submitting
                M.toast({
                    html: `<span style="font-size: 14px">کد یکبار مصرف الزامی است</span>`,
                    classes: 'red',
                    activationPercent: 0.5,
                    outDuration: 400,
                    inDuration: 350,
                    displayLength: 3000
                });

                return false;
            }

            return true;
        }
    </script>
@stop
