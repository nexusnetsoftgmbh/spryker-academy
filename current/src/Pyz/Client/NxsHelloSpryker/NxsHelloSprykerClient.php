<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker;

use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\NxsHelloSpryker\NxsHelloSprykerFactory getFactory()
 */
class NxsHelloSprykerClient extends AbstractClient
{
    /**
     * @return \Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer
     */
    public function getReversedString(): NxsHelloSprykerMessageTransfer
    {
        return $this->getFactory()->createZedStub()->getReversedString();
    }
}
