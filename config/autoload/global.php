<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [
            'Foo' => [
                'Zend\\View\\Model\\JsonModel' => [
                    0 => 'application/vnd.zend+json',
                ],
            ],
        ],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
];
