<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business;

use Pyz\Zed\NxsHelloSpryker\Business\Model\ReadString;
use Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString;
use Pyz\Zed\NxsHelloSpryker\Business\Model\WriteString;
use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig getConfig()
 * @method \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface getQueryContainer()
 */
class NxsHelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\NxsHelloSpryker\Business\Model\ReverseString
     */
    public function createHelloSpryker(): ReverseString
    {
        return new ReverseString(
            $this->createReader(),
            $this->createWriter(),
            $this->getProvidedDependency(NxsHelloSprykerDependencyProvider::FACADE_STRING_FORMAT)
        );
    }

    /**
     * @return \Pyz\Zed\NxsHelloSpryker\Business\Model\ReadString
     */
    public function createReader()
    {
        return new ReadString(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Pyz\Zed\NxsHelloSpryker\Business\Model\WriteString
     */
    public function createWriter()
    {
        return new WriteString(
            $this->getConfig(),
            $this->createReader()
        );
    }
}
