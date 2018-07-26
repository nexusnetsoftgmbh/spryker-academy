<?php


namespace Pyz\Zed\NxsHelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class NxsHelloSprykerFacade
 * @package Pyz\Zed\NxsHelloSpryker\Business
 * @method \Pyz\Zed\NxsHelloSpryker\Business\NxsHelloSprykerBusinessFactory getFactory()()
 */
class NxsHelloSprykerFacade extends AbstractFacade
{

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        return $this->getFactory()->createHelloSpryker()->getReversedString();
    }

}