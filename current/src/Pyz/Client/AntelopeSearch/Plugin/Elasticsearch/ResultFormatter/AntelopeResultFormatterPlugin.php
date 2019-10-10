<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch\Plugin\Elasticsearch\ResultFormatter;


use Elastica\ResultSet;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

class AntelopeResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{
    public const NAME = 'antelope';

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return array
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        foreach ($searchResult->getResults() as $document) {
            return $document->getSource();
        }

        return [];
    }
}