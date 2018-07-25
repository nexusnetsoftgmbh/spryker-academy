<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business\Model;

use Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker;
use Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig;

class WriteString implements WriteStringInterface
{
    /** @var \Pyz\Zed\NxsHelloSpryker\Business\Model\ReadStringInterface */
    protected $reader;

    /** @var \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig */
    protected $config;

    /**
     * WriteString constructor.
     *
     * @param \Pyz\Zed\NxsHelloSpryker\NxsHelloSprykerConfig $config
     * @param \Pyz\Zed\NxsHelloSpryker\Business\Model\ReadStringInterface $readString
     */
    public function __construct(NxsHelloSprykerConfig $config, ReadStringInterface $readString)
    {
        $this->reader = $readString;
        $this->config = $config;
    }

    /**
     * @return \Orm\Zed\NxsHelloSpryker\Persistence\NxsHelloSpryker
     */
    public function persist(): NxsHelloSpryker
    {
        $helloSprykerEntity = $this->reader->getString();

        if (!$helloSprykerEntity) {
            $helloSprykerEntity = new NxsHelloSpryker();
            $helloSprykerEntity->setString($this->config->getString());
            $helloSprykerEntity->save();
        }

        return $helloSprykerEntity;
    }
}
