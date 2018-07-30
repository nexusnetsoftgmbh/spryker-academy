<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\NxsHelloSpryker\Zed;

use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

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
     * @return \Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer
     */
    public function getReversedString(): NxsHelloSprykerMessageTransfer
    {
        return $this->zedRequestClient->call(
            '/nxs-hello-spryker/gateway/get-reversed-string',
            new NxsHelloSprykerMessageTransfer()
        );
    }
}
