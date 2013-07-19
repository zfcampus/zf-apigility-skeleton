<?php
return array(
    // Development time modules
    'modules' => array(
        'ZFTool',
        'ZFApiFirstAdmin'
    ),
    // development time configuration globbing
    'module_listener_options' => array(
        'config_glob_paths' => array('config/autoload/{,*.}{development}.php')
    )
);