@extends('dashboard::layouts.auth_master')


@section('content')

    <div id="forgot-password"
         class="row"
    >
        <div
            class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8"
        >
            <form class="login-form">
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4">رمز را فراموش کردید</h5>
                        <p class="ml-4">میتوانید رمز خود را ریست کنید</p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">person_outline</i>
                        <input id="email"
                               type="email"
                        />
                        <label for="email"
                               class="center-align"
                        >ایمیل</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <a
                            href="#"
                            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12 mb-1"
                        >ریست کردن رمز</a
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small">
                            <a href="{{ route('admin.auth.login') }}">وارد شدن</a>
                        </p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <a href="{{ route('admin.auth.register') }}">ثبت نام</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
