<?php


namespace Pyz\Zed\NxsHelloSpryker\Business;


use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig;

class HelloSprykerFacade
{
    /** @var HelloSprykerFactory */
    private $factory;

    public function getReversedString()
    {
        return $this->getFactory()->createHelloSpryker()->getReversedString();
    }

    /**
     * @return HelloSprykerFactory
     */
    private function getFactory()
    {
        if ($this->factory === null) {
            $this->factory = new HelloSprykerFactory($this->getConfig());
        }
        return $this->factory;
    }

    /**
     * @return NxsHelloSprykerConfig
     */
    private function getConfig()
    {
        return new NxsHelloSprykerConfig();
    }
}