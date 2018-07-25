<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business;

use Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig getConfig()
 * @method \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface getQueryContainer()
 */
class NxsHelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString
     */
    public function createHelloSpryker(): ReverseString
    {
        return new ReverseString(
            $this->getConfig(),
            $this->getQueryContainer()
        );
    }
}
