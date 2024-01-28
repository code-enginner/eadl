<?php

return [
    'name' => 'Transaction',

    'menu' => [
        'module' => 'Transaction',
        'icon' => 'mdi-chart-bar', //Icon List >>> https://pictogrammers.github.io/@mdi/font/6.9.96/
        'label' => 'گزارش تراکنش ها',
        'active' => 1,
        'order' => 3,
        'classes' => 'active open',
        'route' => 'transactions.create', //If this Set to 'null' Converts to "javascript:void(0)"
        'children' => [],
    ]
];
