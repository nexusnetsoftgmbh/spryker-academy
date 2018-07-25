<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business\Model;

use Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker;
use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig;
use Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface;

class ReverseString
{
    /** @var \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig */
    private $config;

    /**
     * @var \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface
     */
    private $queryContainer;

    /**
     * ReverseString constructor.
     *
     * @param \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig $config
     * @param \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface $queryContainer
     */
    public function __construct(NxsHelloSprykerConfig $config, NxsHelloSprykerQueryContainerInterface $queryContainer)
    {
        $this->config = $config;
        $this->queryContainer = $queryContainer;
    }

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        $helloSprykerEntity = $this->queryContainer->createHelloSpryker()->filterByIdHelloSpryker(1)->findOne();

        if (!$helloSprykerEntity) {
            $helloSprykerEntity = new NxsHelloSpryker();
            $helloSprykerEntity->setString($this->config->getString());
            $helloSprykerEntity->save();
        }

        return strrev($helloSprykerEntity->getString());
    }
}
