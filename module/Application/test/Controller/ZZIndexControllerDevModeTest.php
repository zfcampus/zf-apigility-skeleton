<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ApplicationTest\Controller;

use Application\Controller\IndexController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Name is intentional, to force it to run last; this was necessary as,
 * once the Admin module is loaded, the controller is able to find it and
 * will attempt the redirect.
 */
class ZZIndexControllerDevModeTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [
            'modules' => [
                'ZF\Apigility\Admin',
                'ZF\Apigility\Admin\Ui',
            ],
            'module_listener_options' => [
                'config_cache_enabled' => false,
                'config_glob_paths' => [
                    __DIR__ . '/../../../../config/autoload/{,*.}{global,local}.php',
                    __DIR__ . '/../../../../config/autoload/{,*.}{global,local}-development.php',
                ],
            ]
        ];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionRedirectsToAdminUi()
    {
        $this->dispatch('/', 'GET');
        $this->assertResponseStatusCode(302);
        $this->assertRedirectRegex('#/ui$#');
    }
}
