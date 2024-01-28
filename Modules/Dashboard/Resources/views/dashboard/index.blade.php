@extends('dashboard::layouts.master')

@section('css')
    <style>

    </style>
@stop

@section('content')
    <div class="flex justify-center py-6 px-3 bg-white shadow-md ">
        <div><h1 class="inline-block text-3xl"> سامانه خدمات قوه قضائیه </h1></div>
    </div>

    <div
        class="flex 2xl:flex-row-reverse xl:flex-row-reverse lg:flex-row-reverse md:flex-col sm:flex-col justify-around mt-[5rem]">
        <div class="border border-[#e0e0e0] bg-[#eeeeee] x2l:mb-0 xl:mb-0 lg:mb-0 md:mb-[3rem] sm:mb-[3rem] rounded-md shadow-lg "
             data-te-ripple-init
             data-te-ripple-centered="true"
             data-te-ripple-duration="1000ms"
             data-te-ripple-color="#9e9e9e"
        ><a class=" py-[2rem] px-[5rem] block cursor-pointer" href="javascript:void(0)">استعلام اعتبار معاملاتی</a>
        </div>
        <!-- ... -->
        <div class="border  border-[#e0e0e0] bg-[#eeeeee] rounded-md shadow-lg"
             data-te-ripple-init
             data-te-ripple-centered="true"
             data-te-ripple-duration="1000ms"
             data-te-ripple-color="#9e9e9e"
        ><a class=" py-[2rem] px-[5rem] block cursor-pointer" href="javascript:void(0)">تصدیق اصالت گواهی عدم سوء
                پیشینه</a></div>
    </div>
@stop

@section('js')
    <script type="text/javascript">

    </script>
@stop


