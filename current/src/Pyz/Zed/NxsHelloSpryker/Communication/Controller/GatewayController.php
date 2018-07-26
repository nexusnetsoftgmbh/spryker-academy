<?php


namespace Pyz\Zed\NxsHelloSpryker\Communication\Controller;


use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    public function getReversedStringAction(){


        $transfer = new NxsHelloSprykerMessageTransfer();
        $transfer->setValue($this->getFacade()->getReversedString());

        return $transfer;
    }
}