<?php


namespace Pyz\Zed\NxsHelloSpryker;


use Pyz\Shared\NxsHelloSpryker\NxsHelloSprykerConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class NxsHelloSprykerConfig extends AbstractBundleConfig
{
    public function getString()
    {
        return $this->get(NxsHelloSprykerConstants::STRING, 'Hello Spryker!');
    }
}