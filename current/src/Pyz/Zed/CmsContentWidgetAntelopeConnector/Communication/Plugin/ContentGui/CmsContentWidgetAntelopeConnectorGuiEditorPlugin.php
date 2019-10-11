<?php
declare(strict_types=1);

namespace Pyz\Zed\CmsContentWidgetAntelopeConnector\Communication\Plugin\ContentGui;


use Generated\Shared\Transfer\ContentWidgetTemplateTransfer;
use Spryker\Zed\ContentGuiExtension\Dependency\Plugin\ContentGuiEditorPluginInterface;

class CmsContentWidgetAntelopeConnectorGuiEditorPlugin implements ContentGuiEditorPluginInterface
{
    public function getType(): string
    {
        return 'Antelope';
    }

    public function getTemplates(): array
    {
        $default = (new ContentWidgetTemplateTransfer())
            ->setName('Default')
            ->setIdentifier('default');

        return [
            $default
        ];
    }

    public function getTwigFunctionTemplate(): string
    {
        return '{{ ' . 'antelope' . "('%KEY%', '%TEMPLATE%') }}";
    }

}