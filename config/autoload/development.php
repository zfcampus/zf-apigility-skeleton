<?php
return array(
    // Eh, not a fan of having to do this
    'router' => array(
        'routes' => array(
            'zftool-diagnostics' => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/dev/diagnostics',
                    'defaults' => array(
                        'controller' => 'ZFTool\Controller\Diagnostics',
                        'action'     => 'run'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    )
);