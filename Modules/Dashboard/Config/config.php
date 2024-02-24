<?php

return [
    'name' => 'Dashboard',

    'menu' => [
        'module' => 'Dashboard',
        'icon' => 'mdi-home', //Icon List >>> https://pictogrammers.github.io/@mdi/font/6.9.96/
        'label' => 'صفحه اصلی',
        'active' => 1,
        'order' => 1,
        'classes' => 'active open',
        'route' => '/panel', //If this Set to 'null' Converts to "javascript:void(0)"
        'children' => [],
    ]
];
