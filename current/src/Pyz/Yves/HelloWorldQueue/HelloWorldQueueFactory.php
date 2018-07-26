<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
