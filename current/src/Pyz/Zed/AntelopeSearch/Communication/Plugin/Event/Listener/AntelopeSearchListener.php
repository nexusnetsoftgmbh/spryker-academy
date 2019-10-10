<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Event\Listener;


use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Shared\Antelope\AntelopeEvents;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchFacade getFacade()
 */
class AntelopeSearchListener extends AbstractPlugin implements EventHandlerInterface
{
    /**
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $transfer
     * @param string $eventName
     */
    public function handle(TransferInterface $transfer, $eventName): void
    {
        /** @var EventEntityTransfer $transfer */
        if ($eventName === AntelopeEvents::ENTITY_PYZ_ANTELOPE_CREATE) {
            $this->getFacade()->publish($transfer->getId());
        }
    }
}