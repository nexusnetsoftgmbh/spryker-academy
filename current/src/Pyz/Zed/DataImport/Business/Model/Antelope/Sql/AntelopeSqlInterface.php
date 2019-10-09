<?php
declare(strict_types=1);

namespace Pyz\Zed\DataImport\Business\Model\Antelope\Sql;

interface AntelopeSqlInterface
{
    /**
     * @return string
     */
    public function getImportSql(): string;
}
