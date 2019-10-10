<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Event\Subscriber;


use Pyz\Shared\Antelope\AntelopeEvents;
use Pyz\Zed\AntelopeSearch\Communication\Plugin\Event\Listener\AntelopeSearchListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class AntelopeEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(AntelopeEvents::ENTITY_PYZ_ANTELOPE_CREATE, new AntelopeSearchListener());
        $eventCollection->addListenerQueued(AntelopeEvents::ENTITY_PYZ_ANTELOPE_UPDATE, new AntelopeSearchListener());
        $eventCollection->addListenerQueued(AntelopeEvents::ENTITY_PYZ_ANTELOPE_DELETE, new AntelopeSearchListener());

        return $eventCollection;
    }
}