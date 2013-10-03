<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application\Controller;

use Zend\Console\Request as ConsoleRequest;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;

class DevelopmentModeController extends AbstractActionController
{
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $events->attach('dispatch', function($e) {
            $request = $e->getRequest();
            if (!$request instanceof ConsoleRequest) {
                throw new \RuntimeException(sprintf(
                    '%s can only be executed in a console environment',
                    __CLASS__
                ));
            }
        }, 100);
        return $this;
    }

    public function enableAction()
    {
        if (file_exists('config/development.config.php')) {
            // nothing to do
            return "Already in development mode!\n";
        }
        copy('config/development.config.php.dist', 'config/development.config.php');
        return "You are now in development mode.\n";
    }

    public function disableAction()
    {
        if (!file_exists('config/development.config.php')) {
            // nothing to do
            return "Development mode was already disabled.\n";
        }
        unlink('config/development.config.php');
        return "Development mode is now disabled.\n";
    }
}
