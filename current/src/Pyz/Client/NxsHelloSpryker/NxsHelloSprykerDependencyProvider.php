<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker;

use Pyz\Client\Customer\CustomerDependencyProvider;
use Spryker\Client\Kernel\Container;

class NxsHelloSprykerDependencyProvider extends CustomerDependencyProvider
{
    const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addZedRequestClient($container);
        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addZedRequestClient(Container $container): Container
    {
        $container[self::CLIENT_ZED_REQUEST] = function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        };

        return $container;
    }
}
