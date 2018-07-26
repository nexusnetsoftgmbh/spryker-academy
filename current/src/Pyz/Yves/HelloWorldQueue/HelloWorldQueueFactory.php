<?php

namespace Pyz\Yves\HelloWorldQueue;

use Spryker\Client\Queue\QueueClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class HelloWorldQueueFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Queue\QueueClientInterface
     */
    public function getQueueClient(): QueueClientInterface
    {
        return $this->getProvidedDependency(HelloWorldQueueDependencyProvider::CLIENT_QUEUE);
    }
}
