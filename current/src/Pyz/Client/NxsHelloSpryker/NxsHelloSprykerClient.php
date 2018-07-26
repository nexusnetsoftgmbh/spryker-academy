<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker;

use Spryker\Client\Kernel\AbstractClient;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

/**
 * @method \Pyz\Client\NxsHelloSpryker\NxsHelloSprykerFactory getFactory()
 */
class NxsHelloSprykerClient extends AbstractClient
{
    /**
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getReversedString(): TransferInterface
    {
        return $this->getFactory()->createZedStub()->getReversedString();
    }
}
