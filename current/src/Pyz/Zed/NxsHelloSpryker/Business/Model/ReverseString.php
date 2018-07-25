<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker\Business\Model;

use Pyz\Zed\NxsStringFormat\Business\NxsStringFormatFacadeInterface;

class ReverseString
{
    /**
     * @var \Pyz\Zed\NxsHelloSpryker\Business\Model\ReadStringInterface
     */
    private $read;

    /**
     * @var \Pyz\Zed\NxsHelloSpryker\Business\Model\WriteStringInterface
     */
    private $write;

    /**
     * @var \Pyz\Zed\NxsStringFormat\Business\NxsStringFormatFacadeInterface
     */
    private $stringFormatFacade;

    /**
     * ReverseString constructor.
     *
     * @param \Pyz\Zed\NxsHelloSpryker\Business\Model\ReadStringInterface $readString
     * @param \Pyz\Zed\NxsHelloSpryker\Business\Model\WriteStringInterface $writeString
     * @param \Pyz\Zed\NxsStringFormat\Business\NxsStringFormatFacadeInterface $facade
     */
    public function __construct(
        ReadStringInterface $readString,
        WriteStringInterface $writeString,
        NxsStringFormatFacadeInterface $facade
    ) {
        $this->write = $writeString;
        $this->read = $readString;
        $this->stringFormatFacade = $facade;
    }

    /**
     * @return string
     */
    public function getReversedString(): string
    {
        $string = $this->read->getString();

        if (empty($string)) {
            $helloSprykerEntity = $this->write->persist();
            $string = $helloSprykerEntity->getString();
        }

        return $this->stringFormatFacade->getStringFormat()->getReversedString($string);
    }
}
