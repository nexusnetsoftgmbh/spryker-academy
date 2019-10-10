<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch;


use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\AntelopeSearch\AntelopeSearchFactory getFactory()
 */
class AntelopeSearchClient extends AbstractClient implements AntelopeSearchClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getAntelopeByName(string $name): array
    {
        $searchQuery = $this->getFactory()
                            ->createAntelopeQueryPlugin($name);

        $resultFormatters = $this->getFactory()
                                 ->getSearchQueryFormatters();

        $searchResults = $this->getFactory()
                              ->getSearchClient()
                              ->search(
                                  $searchQuery,
                                  $resultFormatters
                              );

        return $searchResults['antelope'] ?? [];
    }
}