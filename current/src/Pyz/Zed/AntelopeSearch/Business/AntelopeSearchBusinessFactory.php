<?php
declare(strict_types=1);

namespace Pyz\Zed\AntelopeSearch\Business;


use Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeSearchWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class AntelopeSearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\AntelopeSearch\Business\Writer\AntelopeSearchWriterInterface
     */
    public function createAntelopeSearchWriter()
    {
        return new AntelopeSearchWriter();
    }
}