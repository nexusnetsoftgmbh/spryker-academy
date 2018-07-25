<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business\Model;

use Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface;

class ReadString implements ReadStringInterface
{
    /**
     * @var \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface
     */
    private $queryContainer;

    /** @var \Orm\Zed\NxsHelloSpryker\Persistence\Base\NxsHelloSpryker */
    private $entity;

    /**
     * ReadString constructor.
     *
     * @param \Pyz\Zed\NxsHelloSpryker\Persistence\NxsHelloSprykerQueryContainerInterface $container
     */
    public function __construct(NxsHelloSprykerQueryContainerInterface $container)
    {
        $this->queryContainer = $container;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        $string = '';
        if ($this->getEntity()) {
            $string = $this->getEntity()->getString();
        }
        return $string;
    }

    /**
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\Base\NxsHelloSpryker
     */
    public function getEntity()
    {
        if ($this->entity === null) {
            $this->createEntity();
        }

        return $this->entity;
    }

    /**
     * @return void
     */
    protected function createEntity()
    {
        $this->entity = $this->queryContainer->createHelloSpryker()->filterByIdHelloSpryker(1)->findOne();
    }
}
