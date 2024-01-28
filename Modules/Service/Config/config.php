<?php

return [
    'name' => 'Service',

    'menu' => [
        'module' => 'Service',
        'icon' => 'mdi-hand-coin-outline', //Icon List >>> https://pictogrammers.github.io/@mdi/font/6.9.96/
        'label' => 'خدمات',
        'active' => 1,
        'order' => 2,
        'classes' => 'active open',
        'route' => 'services.create', //If this Set to 'null' Converts to "javascript:void(0)"
        'children' => [],
    ]
];
