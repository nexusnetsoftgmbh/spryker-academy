<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business;

/**
 * Class NxsHelloSprykerFacade
 * @package Pyz\Zed\NxsHelloSpryker\Business
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerBusinessFactory getFactory()()
 */
interface NxsHelloSprykerFacadeInterface
{
    /**
     * @return string
     */
    public function getReversedString(): string;
}
