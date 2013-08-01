<?php

return array(
    // This should be an array of module namespaces used in the application.
    'modules' => array(
        'Application',
        'ZendDeveloperTools',
        'AssetManager',
        'ZF\ApiProblem',
        'ZF\Hal',
        'ZF\ContentNegotiation',
        'ZF\Rest',
        'ZF\Rpc',
        'ZFApiFirst',
        'ZFApiFirstExample',
        'ZFApiFirstRestExample',
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
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}.php')
    )
);
