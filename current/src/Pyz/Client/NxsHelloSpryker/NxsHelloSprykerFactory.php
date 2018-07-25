<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker;

use Pyz\Client\NxsHelloSpryker\Zed\NxsHelloSprykerStub;
use Spryker\Client\Kernel\AbstractFactory;

class NxsHelloSprykerFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\NxsHelloSpryker\Zed\NxsHelloSprykerStub
     */
    public function createZedStub(): NxsHelloSprykerStub
    {
        return new NxsHelloSprykerStub($this->getZedRequestClient());
    }

    /**
     * @return mixed
     */
    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(NxsHelloSprykerDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
