<?php
declare(strict_types=1);

namespace Pyz\Glue\AntelopesRestApi\Processor\Mapper;

use Generated\Shared\Transfer\AntelopesRestAttributesTransfer;

interface AntelopesResourceMapperInterface
{
    /**
     * @param array $antelopeData
     *
     * @return \Generated\Shared\Transfer\AntelopesRestAttributesTransfer
     */
    public function mapAntelopeDataToAntelopeRestAttributes(array $antelopeData): AntelopesRestAttributesTransfer;
}
