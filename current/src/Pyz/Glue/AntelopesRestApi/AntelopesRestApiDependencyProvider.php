<?php

namespace Pyz\Glue\AntelopesRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

/**
 * @method \Spryker\Glue\AntelopesRestApi\AntelopesRestApiConfig getConfig()
 */
class AntelopesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_ANTELOPE = 'CLIENT_ANTELOPE';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addAntelopeClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addAntelopeClient(Container $container): Container
    {
        $container[static::CLIENT_ANTELOPE] = function (Container $container) {
            return $container->getLocator()->antelopeSearch()->client();
        };

        return $container;
    }
}
