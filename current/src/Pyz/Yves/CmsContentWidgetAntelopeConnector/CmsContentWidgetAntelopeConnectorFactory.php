<?php
declare(strict_types=1);

namespace Pyz\Yves\CmsContentWidgetAntelopeConnector;


use Pyz\Client\AntelopeSearch\AntelopeSearchClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class CmsContentWidgetAntelopeConnectorFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\AntelopeSearch\AntelopeSearchClientInterface
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getAntelopeClient(): AntelopeSearchClientInterface
    {
        return $this->getProvidedDependency(CmsContentWidgetAntelopeConnectorDependencyProvider::CLIENT_ANTELOPE);
    }
}