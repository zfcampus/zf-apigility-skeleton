<?php
return array(
    // Development time modules
    'modules' => array(
        'ZFTool',
        'ZFApiFirstAdmin',
        'ZendDeveloperTools',
        'ZFApiFirstExample',
        'ZFApiFirstRestExample',
    ),
    // development time configuration globbing
    'module_listener_options' => array(
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}-development.php')
    )
);