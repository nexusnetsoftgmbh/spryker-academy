<?php

namespace Pyz\Yves\HelloWorldQueue\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class HelloWorldQueueControllerProvider extends AbstractYvesControllerProvider
{
    const HELLOWORLDQUEUE_INDEX = 'helloworldqueue-index';
    const HELLOWORLDQUEUE_SEND = 'helloworldqueue-send';
    const HELLOWORLDQUEUE_RECEIVE = 'helloworldqueue-receive';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController(
            '/hello-world-queue',
            static::HELLOWORLDQUEUE_INDEX,
            'HelloWorldQueue',
            'Index',
            'index'
        );
        $this->createGetController(
            '/hello-world-queue/send',
            static::HELLOWORLDQUEUE_SEND,
            'HelloWorldQueue',
            'Index',
            'send'
        );
        $this->createGetController(
            '/hello-world-queue/receive',
            static::HELLOWORLDQUEUE_RECEIVE,
            'HelloWorldQueue',
            'Index',
            'receive'
        );
    }
}
