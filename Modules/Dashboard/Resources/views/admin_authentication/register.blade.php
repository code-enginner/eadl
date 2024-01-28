@extends('dashboard::layouts.auth_master')


@section('content')

    <div id="register-page"
         class="row"
    >
        <div
            class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8"
        >
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4">ثبت نام</h5>
                        <p class="ml-4">به جمع ما بپیوند!</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="username"
                               type="text"
                        />
                        <label for="username"
                               class="center-align"
                        >نام کاربری</label
                        >
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">mail_outline</i>
                        <input id="email"
                               type="email"
                        />
                        <label for="email">ایمیل</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password"
                               type="password"
                        />
                        <label for="password">رمز عبور</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password-again"
                               type="password"
                        />
                        <label for="password-again">تکرار رمز عبور</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <a
                            href="index.html"
                            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"
                        >ثبت نام</a
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <p class="margin medium-small">
                            <a href="{{ route('admin.auth.login') }}">حساب کاربری دارید؟ وارد شدن</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
