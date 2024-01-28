<?php

return [
    'name' => 'User',

    'menu' => [
        'module'   => 'User',
        'icon'     => 'mdi-account-multiple-outline',
        'label'    => 'کاربران',
        'active'   => 0,
        'order'    => 12,
        'route'    => NULL,
        'classes'  => '',
        'children' => [
            [
                'icon'     => 'mdi-circle-outline',
                'label'    => '',
                'active'   => 1,
                'order'    => 3,
                'route'    => 'users.create',
                'classes'  => '',
                'children' => [],
            ],
        ],
    ],
];
