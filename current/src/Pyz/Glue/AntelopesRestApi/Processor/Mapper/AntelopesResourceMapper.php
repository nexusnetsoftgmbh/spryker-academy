<?php
declare(strict_types=1);

namespace Pyz\Glue\AntelopesRestApi\Processor\Mapper;


use Generated\Shared\Transfer\AntelopesRestAttributesTransfer;

class AntelopesResourceMapper implements AntelopesResourceMapperInterface
{
    /**
     * @param array $antelopeData
     *
     * @return \Generated\Shared\Transfer\AntelopesRestAttributesTransfer
     */
    public function mapAntelopeDataToAntelopeRestAttributes(array $antelopeData): AntelopesRestAttributesTransfer
    {
        $restAntelopeAttributesTransfer = (new AntelopesRestAttributesTransfer())->fromArray($antelopeData, true);

        return $restAntelopeAttributesTransfer;
    }
}
