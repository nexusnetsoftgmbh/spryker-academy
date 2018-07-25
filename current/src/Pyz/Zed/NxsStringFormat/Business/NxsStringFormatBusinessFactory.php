<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsStringFormat\Business;

use Pyz\Zed\NxsStringFormat\Business\Model\ReverseString;
use Pyz\Zed\NxsStringFormat\Business\Model\ReverseStringInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class NxsStringFormatBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\NxsStringFormat\Business\Model\ReverseStringInterface
     */
    public function createStringFormatter(): ReverseStringInterface
    {
        return new ReverseString();
    }
}
