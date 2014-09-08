<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

return array(
    // This should be an array of module namespaces used in the application.
    'modules' => array(
        'Application',
        'ZF\DevelopmentMode',
        'ZF\Apigility',
        'ZF\Apigility\Provider',
        'ZF\Apigility\Documentation',
        'AssetManager',
        'ZF\ApiProblem',
        'ZF\Configuration',
        'ZF\MvcAuth',
        'ZF\OAuth2',
        'ZF\Hal',
        'ZF\ContentNegotiation',
        'ZF\ContentValidation',
        'ZF\Rest',
        'ZF\Rpc',
        'ZF\Versioning',
    ),
    // This should be an array of paths in which modules reside.
    // If a string key is provided, the listener will consider that a module
    // namespace, the value of that key the specific path to that module's
    // Module class.
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        // Using __DIR__ to ensure cross-platform compatibility. Some platforms --
        // e.g., IBM i -- have problems with globs that are not qualified.
        'config_glob_paths' => array(realpath(__DIR__) . '/autoload/{,*.}{global,local}.php'),
        'config_cache_key' => 'application.config.cache',
        'config_cache_enabled' => true,
        'module_map_cache_key' => 'application.module.cache',
        'module_map_cache_enabled' => true,
        'cache_dir' => 'data/cache/',
    )
);
