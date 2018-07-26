<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker\Zed;

use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class NxsHelloSprykerStub
{
    /** @var \Spryker\Client\ZedRequest\ZedRequestClientInterface */
    protected $zedRequestClient;

    /**
     * NxsHelloSprykerStub constructor.
     *
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getReversedString(): TransferInterface
    {
        return $this->zedRequestClient->call(
            '/nxs-hello-spryker/gateway/get-reversed-string',
            new NxsHelloSprykerMessageTransfer()
        );
    }
}
