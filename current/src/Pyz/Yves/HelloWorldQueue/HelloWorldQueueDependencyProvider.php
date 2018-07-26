<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloWorldQueue;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class HelloWorldQueueDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_QUEUE = 'CLIENT_QUEUE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container[self::CLIENT_QUEUE] = function (Container $container) {
            return $container->getLocator()->queue()->client();
        };

        return $container;
    }
}
