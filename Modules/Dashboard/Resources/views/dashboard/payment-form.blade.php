@extends('dashboard::layouts.master')

@section('css')
    <style>

    </style>
@stop


@section('content')
    <div class="flex justify-center py-6 px-3 bg-white shadow-md ">
        <div><h1 class="inline-block text-xl"> استعلام اعتبار معاملاتی </h1></div>
    </div>

    <div class="mt-5">
        <form action="{{ route('services.payment.register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col justify-stretch ">
                <input type="hidden" name="amount" value="50000">

                <h3 class="mt-5 mb-2 block text-lg">مبلغ قابل پرداخت</h3>
                <div class="border border-[#eeeeee] p-3 rounded-md w-full bg-[#fafafa]">50000</div>
            </div>

            <div class="relative w-full flex flex-row-reverse mt-5">
                <button
                    type="submit"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    پرداخت
                </button>
            </div>
        </form>
    </div>
@stop


@section('js')
    <script type="text/javascript">

    </script>
@stop
