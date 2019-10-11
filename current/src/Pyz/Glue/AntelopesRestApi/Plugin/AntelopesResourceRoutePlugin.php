<?php

namespace Pyz\Glue\AntelopesRestApi\Plugin;

use Generated\Shared\Transfer\AntelopesRestAttributesTransfer;
use Pyz\Glue\AntelopesRestApi\AntelopesRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Glue\AntelopesRestApi\AntelopesRestApiFactory getFactory()
 */
class AntelopesResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet('get', false);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return AntelopesRestApiConfig::RESOURCE_ANTELOPES;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return 'antelopes-resource';
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return AntelopesRestAttributesTransfer::class;
    }
}