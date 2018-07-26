<?php


namespace Pyz\Client\NxsHelloSpryker;


use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\NxsHelloSpryker\NxsHelloSprykerFactory getFactory()
 */
class NxsHelloSprykerClient extends AbstractClient
{

    public function getReversedString(){
        return $this->getFactory()->createZedStub()->getReversedString();
    }
}