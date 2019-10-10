<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch;


use Pyz\Client\AntelopeSearch\Plugin\Elasticsearch\Query\AntelopeQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;

class AntelopeSearchFactory extends AbstractFactory
{
    /**
     * @param string $name
     *
     * @return \Pyz\Client\AntelopeSearch\Plugin\Elasticsearch\Query\AntelopeQueryPlugin
     */
    public function createAntelopeQueryPlugin(string $name)
    {
        return new AntelopeQueryPlugin($name);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return array
     */
    public function getSearchQueryFormatters()
    {
        return $this->getProvidedDependency(AntelopeSearchDependencyProvider::ANTELOPE_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(AntelopeSearchDependencyProvider::CLIENT_SEARCH);
    }
}