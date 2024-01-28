<?php

return [
    'name' => 'Admin',

    'menu' => [
        'module'   => 'Admin',
//        'icon'     => 'mdi-account-wrench-outline',
        'icon'     => 'mdi-account-cog-outline',
        'label'    => 'مدیریت',
        'active'   => 0,
        'order'    => 2,
        'route'    => NULL,
        'classes'  => '',
        'children' => [
            [
                'icon'     => 'mdi-circle-outline',
                'label'    => 'تنظیمات مدیر',
                'active'   => 1,
                'order'    => 3,
                'route'    => NULL,
                'classes'  => '',
                'children' => [
                    [
                        'icon'   => 'mdi-circle-outline',
                        'label'  => 'تنظیمات مدیر فنی',
                        'active' => 1,
                        'order'  => 1,
                        'route'  => 'dashboard.admin',
                    ],
                ],
            ],

            [
                'icon'     => 'mdi-circle-outline',
                'label'    => 'افزودن مدیر',
                'active'   => 1,
                'order'    => 2,
                'route'    => NULL,
                'classes'  => '',
                'children' => [],
            ],


        ],
    ],
];
