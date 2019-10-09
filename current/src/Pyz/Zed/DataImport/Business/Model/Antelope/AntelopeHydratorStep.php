<?php
declare(strict_types=1);

namespace Pyz\Zed\DataImport\Business\Model\Antelope;


use Generated\Shared\Transfer\PyzAntelopeEntityTransfer;
use Pyz\Zed\DataImport\Business\Model\Antelope\Writer\AntelopePdoBulkWriter;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class AntelopeHydratorStep  extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_NAME = 'name';
    public const KEY_COLOR = 'color';
    public const KEY_TRANSFER = 'antelopeTransfer';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $antelopeTransfer = new PyzAntelopeEntityTransfer();
        $antelopeTransfer
            ->setName($dataSet[static::KEY_NAME])
            ->setColor($dataSet[static::KEY_COLOR]);

        $dataSet[static::KEY_TRANSFER] = $antelopeTransfer;
    }
}
