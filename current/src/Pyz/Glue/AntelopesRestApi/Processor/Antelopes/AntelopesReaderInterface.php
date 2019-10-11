<?php
declare(strict_types=1);

namespace Pyz\Glue\AntelopesRestApi\Processor\Antelopes;


use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface AntelopesReaderInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAntelopeSearchData(RestRequestInterface $restRequest): RestResponseInterface;

    /**
     * @param string $name
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Pyz\Glue\AntelopesRestApi\Processor\Antelopes\RestResourceInterface|null
     */
    public function findAntelopeByName(string $name, RestRequestInterface $restRequest): ?RestResourceInterface;
}
