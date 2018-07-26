<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloWorldQueue\Communication\Plugin;

use Exception;
use Spryker\Zed\Queue\Dependency\Plugin\QueueMessageProcessorPluginInterface;

class HelloWorldQueueMessageProcessorPlugin implements QueueMessageProcessorPluginInterface
{
    /**
     * @param array $queueMessageTransfers
     *
     * @return array
     */
    public function processMessages(array $queueMessageTransfers)
    {
        foreach ($queueMessageTransfers as $queueMessageTransfer) {
            try {
                /* Sample Code */
                echo sprintf("[x] %s \r\n", $queueMessageTransfer->getQueueMessage()->getBody());
                $queueMessageTransfer->setAcknowledge(true); /* we acknowledge the message to remove it from the queue */
            } catch (Exception $e) {
                $queueMessageTransfer->setHasError(true); /* we mark the message as an error, it will call errorHandling() for provided queue adapter on this message */
            }
        }

        return $queueMessageTransfers;
    }

    /**
     * @return int
     */
    public function getChunkSize()
    {
        /* Sample Chunk Size */
        return 10;
    }
}
