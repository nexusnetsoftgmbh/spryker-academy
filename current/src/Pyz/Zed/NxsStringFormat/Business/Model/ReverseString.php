<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsStringFormat\Business\Model;

class ReverseString implements ReverseStringInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function getReversedString(string $string): string
    {
        return strrev($string);
    }
}
