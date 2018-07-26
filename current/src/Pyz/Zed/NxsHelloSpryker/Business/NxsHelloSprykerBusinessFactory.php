<?php


namespace Pyz\Zed\NxsHelloSpryker\Business;


use Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class NxsHelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    public function createHelloSpryker(){
        return new ReverseString($this->getConfig());
    }
}