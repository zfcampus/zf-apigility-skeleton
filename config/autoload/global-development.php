<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

use Apigility\ConfigWriterDelegatorFactory;
use ZF\Configuration\ConfigWriter;

return [
    'service_manager' => [
        'delegators' => [
            ConfigWriter::class => [
                ConfigWriterDelegatorFactory::class,
            ],
        ],
    ],
    'view_manager' => [
        'display_exceptions' => true,
    ]
];
