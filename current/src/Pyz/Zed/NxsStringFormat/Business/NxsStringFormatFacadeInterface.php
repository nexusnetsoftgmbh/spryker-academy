<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsStringFormat\Business;

/**
 * @method \Pyz\Zed\NxsStringFormat\Business\NxsStringFormatBusinessFactory getFactory()
 */
interface NxsStringFormatFacadeInterface
{
    /**
     * @return \Pyz\Zed\NxsStringFormat\Business\Model\ReverseString
     */
    public function getStringFormat();
}
