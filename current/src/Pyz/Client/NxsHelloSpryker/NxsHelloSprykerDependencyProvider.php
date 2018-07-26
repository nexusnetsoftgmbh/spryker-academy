<?php


namespace Pyz\Client\NxsHelloSpryker;


use Pyz\Client\Customer\CustomerDependencyProvider;
use Spryker\Client\Kernel\Container;

class NxsHelloSprykerDependencyProvider extends CustomerDependencyProvider
{
    const CLIENT_ZED_REQUEST = 'CLIENT_ZED_REQUEST';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideServiceLayerDependencies(Container $container): container
    {
        $container = $this->addZedRequestClient($container);
        return $container;
    }

    /**
     * @param Container $container
     * @return Container
     */
    protected function addZedRequestClient(Container $container)
    {
        $container[self::CLIENT_ZED_REQUEST] = function (Container $container) {
            return $container->getLocator()->zedRequest()->client();
        };

        return $container;
    }

}