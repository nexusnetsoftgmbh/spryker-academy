<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\NxsHelloSpryker;

use Pyz\Shared\NxsHelloSpryker\NxsHelloSprykerConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class NxsHelloSprykerConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->get(NxsHelloSprykerConstants::STRING, 'Hello Spryker!');
    }
}
