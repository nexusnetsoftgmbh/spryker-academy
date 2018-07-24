<?php


namespace Pyz\Zed\NxsHelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class HelloSprykerFacade extends AbstractFacade
{

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        return $this->getFactory()->createHelloSpryker()->getReversedString();
    }

}