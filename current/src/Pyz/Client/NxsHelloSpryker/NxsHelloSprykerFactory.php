<?php


namespace Pyz\Client\NxsHelloSpryker;


use Pyz\Client\NxsHelloSpryker\Zed\NxsHelloSprykerStub;
use Spryker\Client\Kernel\AbstractFactory;

class NxsHelloSprykerFactory extends AbstractFactory
{
    public function createZedStub()
    {
        return new NxsHelloSprykerStub($this->getZedRequestClient());
    }

    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(NxsHelloSprykerDependencyProvider::CLIENT_ZED_REQUEST);
    }
}