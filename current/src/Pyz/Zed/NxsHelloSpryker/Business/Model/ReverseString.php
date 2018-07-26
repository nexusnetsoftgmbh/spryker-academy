<?php


namespace Pyz\Zed\NxsHelloSpryker\Business\Model;


use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig;

class ReverseString
{
    /** @var NxsHelloSprykerConfig */
    private $config;

    /**
     * ReverseString constructor.
     * @param NxsHelloSprykerConfig $config
     */
    public function __construct(NxsHelloSprykerConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        return strrev($this->config->getString());
    }
}