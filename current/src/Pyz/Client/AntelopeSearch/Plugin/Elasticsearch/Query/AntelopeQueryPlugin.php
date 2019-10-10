<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch\Plugin\Elasticsearch\Query;


use Elastica\Query;
use Elastica\Query\BoolQuery;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class AntelopeQueryPlugin implements QueryInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSearchQuery()
    {
        $boolQuery = (new BoolQuery())
            ->addMust(
                new Query\Exists('id_antelope')
            )
            ->addMust(
                new Query\Match('name', $this->name)
            );

        $query = (new Query())
            ->setQuery($boolQuery);

        return $query;
    }
}