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

            <div class="flex flex-row-reverse justify-stretch ">
                <div class="relative mb-3 ml-3 grow"
                     data-te-input-wrapper-init
                     data-te-class-notch="group flex flex-row-reverse absolute right-0 top-0 w-1/2 max-w-full h-full text-right pointer-events-none"
                     data-te-class-notch-leading="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none left-0 top-0 h-full w-2 border-l-0 rounded-r-[0.25rem] group-data-[te-input-focused]:border-l-0 group-data-[te-input-state-active]:border-l-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,_0_-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
                     data-te-class-notch-trailing="pointer-events-none border border-solid box-border bg-transparent transition-all duration-200 ease-linear motion-reduce:transition-none grow h-full border-r-0 rounded-l-[0.25rem] group-data-[te-input-focused]:border-r-0 group-data-[te-input-state-active]:border-r-0 border-neutral-300 dark:border-neutral-600 group-data-[te-input-focused]:shadow-[_0_-1px_0_0_#3b71ca,_0_1px_0_0_#3b71ca,-1px_0_0_#3b71ca] group-data-[te-input-focused]:border-primary"
                >
                    <input
                        type="text"
                        class="text-right peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="amount"
                        name="amount"
                        placeholder="مبلغ پرداختی"
                    /> <label
                        for="amount"
                        class="pointer-events-none absolute right-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:right-0.5 peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                    >مبلغ پرداختی </label>
                </div>
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
