<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Apigility;

use Interop\Container\ContainerInterface;
use Zend\Config\Writer\PhpArray;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class ConfigWriterDelegatorFactory implements DelegatorFactoryInterface
{
    /**
     * Configures PhpArray config writers to use short array syntax and class name scalars.
     *
     * @param ContainerInterface $container
     * @param string $name
     * @param callable $callback
     * @param null|array $options
     * @return PhpArray|\Zend\Config\Writer\WriterInterface
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $writer = $callback();
        if (! $writer instanceof PhpArray) {
            return $writer;
        }

        $writer->setUseBracketArraySyntax(true);
        $writer->setUseClassNameScalars(true);

        return $writer;
    }
}
