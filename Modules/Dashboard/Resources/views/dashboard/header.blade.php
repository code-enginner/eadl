<header class="w-full h-[5rem]">

    <div class="flex justify-between relative w-full h-[5rem] bg-[#FFFFFF] py-4 px-4 text-neutral-500 shadow-md dark:bg-neutral-600 2xl:pr-60 xl:pr-60 lg:pr-60"
    >

        <ul class="flex flex-row flex-nowrap justify-start items-center gap-2 w-fit">
            <li class=""
            >

                <div class="relative w-fit h-fit rounded-full cursor-pointer"
                     data-te-dropdown-ref
                    {{-- data-te-ripple-init
                     data-te-ripple-color="dark"
                     data-te-ripple-duration="200ms"--}}
                >

                    <img id="admin-profile-dropdown"
                         src="{{ asset('public-admin/images/avatar/avatar-1.png') }}"
                         alt=""
                         width="40"
                         height="40"
                         class="border-2 rounded-full shadow-sm"
                         data-te-dropdown-toggle-ref
                         aria-expanded="false"
                    >

                    <ul
                        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-right text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="admin-profile-dropdown"
                        data-te-dropdown-menu-ref
                    >
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-yekan align-middle text-[0.8rem] font-medium text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="javascript:void(0)"
                                data-te-dropdown-item-ref
                            >
                                <span class="">حساب کاربری</span>
                                <i class="mdi mdi-account-outline pl-2 text-[1.2rem]"></i>
                            </a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-yekan align-middle text-[0.8rem] font-medium text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="javascript:void(0)"
                                data-te-dropdown-item-ref
                            >
                                <span class="">راهنما</span>
                                <i class="mdi mdi-account-question-outline pl-2 text-[1.2rem]"></i>
                            </a
                            >
                        </li>
                        <hr
                            class="my-2 h-0 border border-t-0 border-solid border-neutral-700 opacity-25 dark:border-neutral-200"
                        />
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-yekan align-middle text-[0.8rem] font-medium text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
{{--                                href="{{ route('admin.auth.logout') }}"--}}
                                href="javascript:void(0)"
                                data-te-dropdown-item-ref
                            >
                                <span class="">خروج</span>
                                <i class="mdi mdi-logout pl-2 text-[1.2rem]"></i>
                            </a
                            >
                        </li>
                    </ul>


                </div>

            </li>

            {{--  <li class=""
                  data-te-dropdown-ref
              >
                  <a href="javascript:void(0)"
                     id="dropdownMenuButton2d"
                     class="block pointer transition ease-in-out duration-200"
                     data-te-ripple-init
                     data-te-ripple-color="dark"
                  >

                  </a>
              </li>

              <li class=""
                  data-te-dropdown-ref
              >
                  <a href="javascript:void(0)"
                     id="dropdownMenuButton3d"
                     class="block pointer transition ease-in-out duration-200"
                     data-te-ripple-init
                     data-te-ripple-color="dark"
                  > <i class="mdi "></i> </a>
              </li>--}}
        </ul>


        <button
            id="open-admin-menu"
            class="inline-block 2xl:hidden xl:hidden lg:hidden px-[0.7rem] text-[1.5rem] outline-none border-0 focus:outline-0 focus:border-0 active:outline-none active:border-0 font-medium"
            data-te-ripple-init
            data-te-ripple-centered="true"
            data-te-ripple-duration="500ms"
            data-te-ripple-color="dark"
        >
            <i class="mdi mdi-menu"></i>
        </button>

    </div>

</header>
