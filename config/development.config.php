<?php
return array(
    // Development time modules
    'modules' => array(
        'ZFTool',
        'ZF\ApiFirstAdmin',
        'ZendDeveloperTools',
        'ZF\ApiFirstExample',
    ),
    // development time configuration globbing
    'module_listener_options' => array(
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}-development.php')
    )
);
