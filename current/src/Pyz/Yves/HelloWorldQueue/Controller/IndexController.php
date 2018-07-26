<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloWorldQueue\Controller;

use Generated\Shared\Transfer\QueueReceiveMessageTransfer;
use Generated\Shared\Transfer\QueueSendMessageTransfer;
use Generated\Shared\Transfer\RabbitMqConsumerOptionTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\HelloWorldQueue\HelloWorldQueueFactory getFactory()
 */
class IndexController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        return [];
    }

    /**
     * @return array
     */
    public function sendAction(): array
    {
        $queueSendTransfer = new QueueSendMessageTransfer();
        $queueSendTransfer->setBody('Hello, World!');

        $queueClient = $this->getFactory()->getQueueClient();
        $queueClient->sendMessage('hello', $queueSendTransfer);

        return [
            'success' => true,
        ];
    }

    /**
     * @return array
     */
    public function receiveAction()
    {
        $queueClient = $this->getFactory()->getQueueClient();

        $queueReceiveMessageTransfer = $queueClient->receiveMessage('hello', $this->createReceiverOption());

        return $this->getMessage($queueReceiveMessageTransfer);
    }

    /**
     * @return array
     */
    protected function createReceiverOption()
    {
        $rabbitmqReceiveOptionTransfer = new RabbitMqConsumerOptionTransfer();
        $rabbitmqReceiveOptionTransfer->setNoAck(false); /* it prevents the queue to delete the message until we send the `acknowledging` */

        return [
            'rabbitmq' => $rabbitmqReceiveOptionTransfer,
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QueueReceiveMessageTransfer $queueReceiveMessageTransfer
     *
     * @return array
     */
    protected function getMessage(QueueReceiveMessageTransfer $queueReceiveMessageTransfer): array
    {

        $success = false;
        $message = '';

        if (method_exists($queueReceiveMessageTransfer->getQueueMessage(), 'getBody')) {
            $message = $queueReceiveMessageTransfer->getQueueMessage()->getBody();
            $success = true;
        }

        return [
            'message' => $message,
            'success' => $success,
        ];
    }
}
