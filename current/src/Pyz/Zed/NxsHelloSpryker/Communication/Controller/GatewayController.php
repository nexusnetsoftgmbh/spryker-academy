<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Communication\Controller;

use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @return \Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer
     */
    public function getReversedStringAction(): NxsHelloSprykerMessageTransfer
    {
        $transfer = new NxsHelloSprykerMessageTransfer();
        $transfer->setValue($this->getFacade()->getReversedString());

        return $transfer;
    }
}
