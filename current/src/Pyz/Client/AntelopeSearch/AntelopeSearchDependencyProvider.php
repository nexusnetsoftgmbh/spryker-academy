<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch;


use Pyz\Client\AntelopeSearch\Plugin\Elasticsearch\ResultFormatter\AntelopeResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class AntelopeSearchDependencyProvider extends AbstractDependencyProvider
{
    const CLIENT_SEARCH = 'CLIENT_SEARCH';
    const ANTELOPE_RESULT_FORMATTER_PLUGINS = 'ANTELOPE_RESULT_FORMATTER_PLUGINS';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addSearchClient($container);
        $container = $this->addCatalogSearchResultFormatterPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addSearchClient(Container $container)
    {
        $container[static::CLIENT_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->client();
        };

        return $container;
    }

    public function addCatalogSearchResultFormatterPlugins($container)
    {
        $container[static::ANTELOPE_RESULT_FORMATTER_PLUGINS] = function () {
            return [
                new AntelopeResultFormatterPlugin(),
            ];
        };

        return $container;
    }
}