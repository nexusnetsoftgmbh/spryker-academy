<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Business\Writer;


use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeSearch\Persistence\PyzAntelopeSearchQuery;

class AntelopeSearchWriter implements AntelopeSearchWriterInterface
{
    /**
     * @param int $idAntelope
     */
    public function publish(int $idAntelope): void
    {
        $antelopeEntity = PyzAntelopeQuery::create()
                                          ->filterByIdAntelope($idAntelope)
                                          ->findOne();

        $antelopeTransfer = new AntelopeTransfer();
        $antelopeTransfer->fromArray($antelopeEntity->toArray());

        $searchEntity = PyzAntelopeSearchQuery::create()
                                              ->filterByFkAntelope($idAntelope)
                                              ->findOneOrCreate();
        $searchEntity->setFkAntelope($idAntelope);
        $searchEntity->setData($antelopeTransfer->toArray());

        $searchEntity->save();
    }
}