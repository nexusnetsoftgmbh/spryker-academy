<?php


namespace Pyz\Client\NxsHelloSpryker\Zed;


use Generated\Shared\Transfer\NxsHelloSprykerMessageTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class NxsHelloSprykerStub
{
    /** @var ZedRequestClientInterface  */
    protected $zedRequestClient;

    /**
     * NxsHelloSprykerStub constructor.
     * @param ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    public function getReversedString(){
        return $this->zedRequestClient->call(
            '/nxs-hello-spryker/gateway/get-reversed-string',
            new NxsHelloSprykerMessageTransfer()
        );
    }
}