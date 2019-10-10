<?php
declare(strict_types=1);

namespace Pyz\Client\AntelopeSearch;


/**
 * @method \Pyz\Client\AntelopeSearch\AntelopeSearchFactory getFactory()
 */
interface AntelopeSearchClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getAntelopeByName(string $name): array;
}