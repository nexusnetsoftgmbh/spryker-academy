<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Business\Writer;

interface AntelopeSearchWriterInterface
{
    /**
     * @param int $idAntelope
     */
    public function publish(int $idAntelope): void;
}