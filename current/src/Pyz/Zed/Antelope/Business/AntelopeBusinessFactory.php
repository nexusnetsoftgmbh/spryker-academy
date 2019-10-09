<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Business;


use Pyz\Zed\Antelope\Business\Model\Reader\AntelopeReader;
use Pyz\Zed\Antelope\Business\Model\Reader\AntelopeReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class AntelopeBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\Antelope\Business\Model\Reader\AntelopeReaderInterface
     */
    public function createAntelopeReader(): AntelopeReaderInterface
    {
        return new AntelopeReader(
            $this->getRepository()
        );
    }
}