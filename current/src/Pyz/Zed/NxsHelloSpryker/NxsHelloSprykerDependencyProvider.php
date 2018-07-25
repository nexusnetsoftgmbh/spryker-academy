<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class NxsHelloSprykerDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_STRING_FORMAT = 'FACADE_STRING_FORMAT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addStringFormatFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStringFormatFacade(Container $container): Container
    {
        $container[static::FACADE_STRING_FORMAT] = function (Container $container) {
            return $container->getLocator()->nxsStringFormat()->facade();
        };

        return $container;
    }
}
