<?php
declare(strict_types=1);

namespace Pyz\Zed\DataImport\Business\Model\Antelope\Writer;

use Pyz\Shared\Antelope\AntelopeEvents;
use Pyz\Zed\DataImport\Business\Model\Antelope\AntelopeHydratorStep;
use Pyz\Zed\DataImport\Business\Model\Antelope\Sql\AntelopeSqlInterface;
use Pyz\Zed\DataImport\Business\Model\DataFormatter\DataImportDataFormatterInterface;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ProductConcreteHydratorStep;
use Pyz\Zed\DataImport\Business\Model\PropelExecutorInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetWriterInterface;
use Spryker\Zed\DataImport\Business\Model\Publisher\DataImporterPublisher;

class AntelopePdoBulkWriter implements DataSetWriterInterface
{
    public const BULK_SIZE = 1000;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Antelope\Sql\AntelopeSqlInterface
     */
    protected $antelopeSql;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\PropelExecutorInterface
     */
    protected $propelExecutor;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\DataFormatter\DataImportDataFormatterInterface
     */
    protected $dataFormatter;



    /**
     * @var array
     */
    protected static $antelope = [];

    /**
     * AntelopePdoBulkWriter constructor.
     *
     * @param \Pyz\Zed\DataImport\Business\Model\Antelope\Sql\AntelopeSqlInterface $antelopeSql
     * @param \Pyz\Zed\DataImport\Business\Model\PropelExecutorInterface $propelExecutor
     * @param \Pyz\Zed\DataImport\Business\Model\DataFormatter\DataImportDataFormatterInterface $dataFormatter
     */
    public function __construct(
        AntelopeSqlInterface $antelopeSql,
        PropelExecutorInterface $propelExecutor,
        DataImportDataFormatterInterface $dataFormatter
    ) {
        $this->antelopeSql = $antelopeSql;
        $this->propelExecutor = $propelExecutor;
        $this->dataFormatter = $dataFormatter;
    }

    public function write(DataSetInterface $dataSet)
    {
        static::$antelope[] = $dataSet[AntelopeHydratorStep::KEY_TRANSFER]->modifiedToArray();

        if (count(static::$antelope) >= static::BULK_SIZE) {
            $this->flush();
        }
    }

    public function flush()
    {
        $name = $this->dataFormatter->formatPostgresArrayString(
            $this->dataFormatter->getCollectionDataByKey(static::$antelope, AntelopeHydratorStep::KEY_NAME)
        );
        $color = $this->dataFormatter->formatPostgresArrayString(
            $this->dataFormatter->getCollectionDataByKey(static::$antelope, AntelopeHydratorStep::KEY_COLOR)
        );

        $sql = $this->antelopeSql->getImportSql();
        $parameters = [
            $name,
            $color
        ];
        $storedEntities = $this->propelExecutor->execute($sql, $parameters);

        foreach ($storedEntities as $entity) {
            DataImporterPublisher::addEvent(AntelopeEvents::ENTITY_PYZ_ANTELOPE_CREATE, $entity['id_antelope']);
        }

        $this->flushStorage();
    }

    protected function flushStorage(): void
    {
        static::$antelope = [];
    }

}
