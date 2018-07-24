<?php


namespace Pyz\Zed\NxsHelloSpryker\Business;


use Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString;
use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig;

class HelloSprykerFactory
{
    /** @var string */
    private $config;

    public function __construct(NxsHelloSprykerConfig $config)
    {
        $this->config = $config;
    }

    public function createHelloSpryker(){
        return new ReverseString($this->config);
    }
}