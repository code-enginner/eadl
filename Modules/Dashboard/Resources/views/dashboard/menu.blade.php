<nav
    id="admin-navbar"
    class="fixed translate-x-[100%] border-l right-0 top-0 z-[2000] h-screen w-60 bg-[#424242] shadow-md transition-transform ease-in-out duration-300 font-semibold font-yekan 2xl:translate-x-0 xl:translate-x-0 lg:translate-x-0 "
    data-te-perfect-scrollbar-init
>

    <div id="admin-panel-logo"
         class="w-full h-[5rem] overflow-hidden border-b border-gray-300"
    >

        <button id="close-admin-menu"
                class="float-right mt-[20px] mr-[20px] block 2xl:hidden xl:hidden lg:hidden px-2 py-[0.1rem] z-[3000] rounded-lg text-gray-300 bg-gray-100/40 hover:bg-gray-300/100 hover:text-gray-600 focus:outline-0 focus:border-0 active:outline-none active:border-0 transition ease-in-out duration-150"
                data-te-ripple-init
                data-te-ripple-centered="true"
                data-te-ripple-color="dark"
                data-te-ripple-duration="400ms"
        >
            <i class="mdi mdi-close text-[1.5rem] outline-none"></i>
        </button>

        <a href="{{ route('dashboard.admin') }}"
           class="block cursor-pointer w-full h-[5rem]"
        > <img
                src=""
                alt="Admin Panel Logo"
                class="w-full h-full"
                width="100%"
            /> </a>

    </div>

    <div class="mt-2"
         id="scrollContainer"
    >

        <ul class="relative m-0 list-none px-[0.2rem] text-right pb-5"
        >
            @foreach($menus as $menu)

                @if(!(bool)$menu['active'])
                    @continue
                @endif

                <li class="item relative {{ empty($menu['children']) ? 'root-single-item' : 'level-one-parent close'}}"
                >
                    <a href="{{ is_null($menu['route']) ? 'javascript:void(0)' : $menu['route']}}"
                       class="router item-link relative text-white block w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30  hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                       data-te-ripple-init
                       data-te-ripple-centered="true"
                       data-te-ripple-color="dark"
                       data-te-ripple-duration="1000ms"
                       onclick="setActiveRoute(this)"
                    > <i class="absolute right-0 mr-[0.5rem] ml-2 mdi {{ $menu['icon'] }} text-[1.3rem]"></i>
                        <span class="mr-[2.5rem] text-[0.8rem] font-yekan">{{ $menu['label'] }}</span>
                        <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem] transition-transform duration-200 ease-in-out"></i>
                    </a>

                    @if(!empty($menu['children']))
                        <ul class="submenu-level-one w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden ">
                            @foreach($menu['children'] as $levelTwo)

                                @if(empty($levelTwo['children']))
                                    <li class="item submenu-item relative level-one-single-item">
                                        <a href="{{ is_null($levelTwo['route']) ? 'JavaScript:void(0)' : route( $levelTwo['route'] ) }}"
                                           class="router level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                           data-te-ripple-init
                                           data-te-ripple-centered="true"
                                           data-te-ripple-color="dark"
                                           data-te-ripple-duration="1000ms"
                                        >
                                            <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                            <span class="mr-[1.9rem] text-[0.7rem] font-yekan">{{ $levelTwo['label'] }}</span>
                                        </a>
                                    </li>
                                @else

                                    <li class="item submenu-item relative level-two-parent close">
                                        <a href="javascript:void(0)"
                                           class="router level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                           data-te-ripple-init
                                           data-te-ripple-centered="true"
                                           data-te-ripple-color="dark"
                                           data-te-ripple-duration="1000ms"
                                        > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle text-[0.6rem]"></i>
                                            <span class="mr-[1.9rem] text-[0.7rem] font-yekan">{{ $levelTwo['label'] }}</span>
                                            <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem] transition duration-200 ease-in-out"></i>
                                        </a>

                                        {{-- Sub menu level two (end)--}}
                                        <ul class="submenu-level-two  w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden">

                                            @foreach($levelTwo['children'] as $levelThree)
                                                <li class="item submenu-item level-two-single-item relative">
                                                    <a href="{{ route($levelThree['route']) }}"
                                                       class="router level-two-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                                       data-te-ripple-init
                                                       data-te-ripple-centered="true"
                                                       data-te-ripple-color="dark"
                                                       data-te-ripple-duration="1000ms"
                                                    >
                                                        <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                                        <span class="mr-[1.9rem] text-[0.7rem] font-yekan">{{ $levelThree['label'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>


{{-- Menue Code Base --}}
{{--<ul class="relative m-0 list-none px-[0.2rem] text-right"
        >
            <li class="item level-one-parent relative close"
            >
                <a href="javascript:void(0)"
                   class="item-link relative block w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                   data-te-ripple-init
                   data-te-ripple-centered="true"
                   data-te-ripple-color="dark"
                   data-te-ripple-duration="1000ms"
                > <i class="absolute right-0 mr-[0.5rem] ml-2 mdi mdi-message-text-outline text-[1.3rem]"></i>
                    <span class="mr-[2.5rem] text-[0.9rem]">Item 2</span>
                    <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem] transition-transform duration-200 ease-in-out"></i>
                </a>


                --}}{{-- Sub menu level one --}}{{--
                <ul class="submenu-level-one  w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden ">
                    <li class="item submenu-item relative level-one-single-item">
                        <a href="javascript:void(0)"
                           class="level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                           data-te-ripple-init
                           data-te-ripple-centered="true"
                           data-te-ripple-color="dark"
                           data-te-ripple-duration="1000ms"
                        > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                            <span class="mr-[1.9rem] text-[0.9rem]">Sub-menu-item 1</span> </a>
                    </li>

                    <li class="item submenu-item relative level-two-parent close">
                        <a href="javascript:void(0)"
                           class="level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                           data-te-ripple-init
                           data-te-ripple-centered="true"
                           data-te-ripple-color="dark"
                           data-te-ripple-duration="1000ms"
                        > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle text-[0.6rem]"></i>
                            <span class="mr-[1.9rem] text-[0.9rem]">Sub-menu-item 2</span>
                            <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem] transition duration-200 ease-in-out"></i>
                        </a>

                        --}}{{-- Sub menu level two (end)--}}{{--
                        <ul class="submenu-level-two  w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden">
                            <li class="item submenu-item level-two-single-item relative">
                                <a href="javascript:void(0)"
                                   class="level-two-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                   data-te-ripple-init
                                   data-te-ripple-centered="true"
                                   data-te-ripple-color="dark"
                                   data-te-ripple-duration="1000ms"
                                > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                    <span class="mr-[1.9rem] text-[0.9rem]">Deep-sub-menu-item 1</span>

                                </a>
                            </li>

                            <li class="item submenu-item level-two-single-item relative">
                                <a href="javascript:void(0)"
                                   class="level-two-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-100 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                   data-te-ripple-init
                                   data-te-ripple-centered="true"
                                   data-te-ripple-color="dark"
                                   data-te-ripple-duration="1000ms"
                                > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                    <span class="mr-[1.9rem] text-[0.9rem]">Deep-sub-menu-item 2</span> </a>
                            </li>
                        </ul>

                    </li>
                </ul>

            </li>

            <li class="item root-single-item relative"
            >
                <a href="javascript:void(0)"
                   class="item-link block w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-in-out hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                   data-te-ripple-init
                   data-te-ripple-centered="true"
                   data-te-ripple-color="dark"
                   data-te-ripple-duration="1000ms"
                > <i class="absolute right-0 mr-[0.5rem] ml-2 mdi mdi-account text-[1.3rem]"></i>
                    <span class="mr-[2.5rem] text-[0.9rem]">Item 3</span> </a>
            </li>

            <li class="item level-one-parent relative close"
            >
                <a href="javascript:void(0)"
                   class="item-link relative block w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none --}}{{--focus:bg-gray-500/30--}}{{-- focus:text-inherit focus:outline-none --}}{{--active:bg-gray-500/30--}}{{-- active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                   data-te-ripple-init
                   data-te-ripple-centered="true"
                   data-te-ripple-color="dark"
                   data-te-ripple-duration="1000ms"
                > <i class="absolute right-0 mr-[0.5rem] ml-2 mdi mdi-message-text-outline text-[1.3rem]"></i>
                    <span class="mr-[2.5rem] text-[0.9rem]">Item 4</span>
                    <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem]  transition duration-200 ease-in-out"></i>
                </a>

                --}}{{-- Sub menu level one --}}{{--
                <ul class="submenu-level-one w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden ">
                    <li class="item submenu-item relative level-one-single-item">
                        <a href="javascript:void(0)"
                           class="level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                           data-te-ripple-init
                           data-te-ripple-centered="true"
                           data-te-ripple-color="dark"
                           data-te-ripple-duration="1000ms"
                        > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                            <span class="mr-[1.9rem] text-[0.9rem]">Sub-menu-item 1</span> </a>
                    </li>

                    <li class="item submenu-item relative level-two-parent close">
                        <a href="javascript:void(0)"
                           class="level-one-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                           data-te-ripple-init
                           data-te-ripple-centered="true"
                           data-te-ripple-color="dark"
                           data-te-ripple-duration="1000ms"
                        > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle text-[0.6rem]"></i>
                            <span class="mr-[1.9rem] text-[0.9rem]">Sub-menu-item 2</span>
                            <i class="level-arrow mdi mdi-chevron-left absolute left-0 text-[1.1rem] font-medium ml-[0.5rem] transition duration-200 ease-in-out"></i>
                        </a>


                        --}}{{-- Sub menu level two (end)--}}{{--
                        <ul class="submenu-level-two  w-full max-h-0 transition-max-height ease-in-out duration-300 bg-slate-100 overflow-hidden">
                            <li class="item submenu-item level-two-single-item relative">
                                <a href="javascript:void(0)"
                                   class="level-two-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                   data-te-ripple-init
                                   data-te-ripple-centered="true"
                                   data-te-ripple-color="dark"
                                   data-te-ripple-duration="1000ms"
                                > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                    <span class="mr-[1.9rem] text-[0.9rem]">Deep-sub-menu-item 1</span>

                                </a>
                            </li>

                            <li class="item submenu-item level-two-single-item relative">
                                <a href="javascript:void(0)"
                                   class="level-two-item-link block relative w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                   data-te-ripple-init
                                   data-te-ripple-centered="true"
                                   data-te-ripple-color="dark"
                                   data-te-ripple-duration="1000ms"
                                > <i class="absolute right-0 mr-[0.8rem] ml-2 mdi mdi-circle-outline text-[0.6rem]"></i>
                                    <span class="mr-[1.9rem] text-[0.9rem]">Deep-sub-menu-item 2</span> </a>
                            </li>
                        </ul>

                    </li>
                </ul>

            </li>

            <li class="item root-single-item relative"
            >
                <a href="javascript:void(0)"
                   class="item-link block w-full h-12 leading-[3rem] cursor-pointer group truncate outline-none transition duration-200 ease-in-out hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:text-inherit focus:outline-none active:text-inherit active:outline-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                   data-te-ripple-init
                   data-te-ripple-centered="true"
                   data-te-ripple-color="dark"
                   data-te-ripple-duration="1000ms"
                > <i class="absolute right-0 mr-[0.5rem] ml-2 mdi mdi-account text-[1.3rem]"></i>
                    <span class="mr-[2.5rem] text-[0.9rem]">Item 5</span> </a>
            </li>

        </ul>--}}
