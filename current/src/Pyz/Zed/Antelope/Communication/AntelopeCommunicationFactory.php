<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Communication;


use Pyz\Zed\Antelope\Communication\Table\AntelopeTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class AntelopeCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\Antelope\Communication\Table\AntelopeTable
     */
    public function createAntelopeTable()
    {
        return new AntelopeTable(
            $this->getQueryContainer()
        );
    }
}