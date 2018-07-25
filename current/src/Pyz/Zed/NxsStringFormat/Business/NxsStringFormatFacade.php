<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsStringFormat\Business;

use Pyz\Zed\NxsStringFormat\Business\Model\ReverseStringInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\NxsStringFormat\Business\NxsStringFormatBusinessFactory getFactory()
 */
class NxsStringFormatFacade extends AbstractFacade implements NxsStringFormatFacadeInterface
{
    /**
     * @return \Pyz\Zed\NxsStringFormat\Business\Model\ReverseStringInterface
     */
    public function getStringFormat(): ReverseStringInterface
    {
        return $this->getFactory()->createStringFormatter();
    }
}
