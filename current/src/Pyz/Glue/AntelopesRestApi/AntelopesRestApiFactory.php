<?php

namespace Pyz\Glue\AntelopesRestApi;

use Pyz\Client\AntelopeSearch\AntelopeSearchClientInterface;
use Pyz\Glue\AntelopesRestApi\Processor\Antelopes\AntelopesReader;
use Pyz\Glue\AntelopesRestApi\Processor\Antelopes\AntelopesReaderInterface;
use Pyz\Glue\AntelopesRestApi\Processor\Mapper\AntelopesResourceMapper;
use Spryker\Glue\Kernel\AbstractFactory;

class AntelopesRestApiFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Glue\AntelopesRestApi\Processor\Mapper\AntelopesResourceMapper
     */
    public function createAntelopeResourceMapper(): AntelopesResourceMapper
    {
        return new AntelopesResourceMapper();
    }

    /**
     * @return \Pyz\Glue\AntelopesRestApi\Processor\Antelopes\AntelopesReaderInterface
     */
    public function createAntelopesReader(): AntelopesReaderInterface
    {
        return new AntelopesReader(
            $this->getAntelopeClient(),
            $this->getResourceBuilder(),
            $this->createAntelopeResourceMapper()
        );
    }

    /**
     * @return \Pyz\Client\AntelopeSearch\AntelopeSearchClientInterface
     * @throws \Spryker\Glue\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getAntelopeClient(): AntelopeSearchClientInterface
    {
        return $this->getProvidedDependency(AntelopesRestApiDependencyProvider::CLIENT_ANTELOPE);
    }
}
