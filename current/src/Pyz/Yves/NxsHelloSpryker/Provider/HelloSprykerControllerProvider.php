<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NxsHelloSpryker\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class HelloSprykerControllerProvider extends AbstractYvesControllerProvider
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app): void
    {
        $this->createController('/nxs-hello-spryker', 'nxs-hello-spryker', 'NxsHelloSpryker', 'HelloSpryker', 'index');
    }
}
