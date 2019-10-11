<?php
declare(strict_types=1);

namespace Pyz\Yves\CmsContentWidgetAntelopeConnector\Plugin\CmsContentWidget;


use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;
use Spryker\Yves\CmsContentWidget\Dependency\CmsContentWidgetPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \Pyz\Yves\CmsContentWidgetAntelopeConnector\CmsContentWidgetAntelopeConnectorFactory getFactory()
 */
class AntelopeContentWidgetPlugin extends AbstractPlugin implements CmsContentWidgetPluginInterface
{
    /**
     * @var \Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface
     */
    protected $widgetConfiguration;

    /**
     * AntelopeContentWidgetPlugin constructor.
     *
     * @param \Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface $widgetConfiguration
     */
    public function __construct(CmsContentWidgetConfigurationProviderInterface $widgetConfiguration)
    {
        $this->widgetConfiguration = $widgetConfiguration;
    }

    /**
     * @return callable
     */
    public function getContentWidgetFunction(): callable
    {
        return [$this, 'contentWidgetFunction'];
    }

    /**
     * @param \Twig_Environment $twig
     * @param array $context
     * @param array $names
     * @param null $templateIdentifier
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function contentWidgetFunction(Twig_Environment $twig, array $context, array $names, $templateIdentifier = null): string
    {
        $templatePath = $this->resolveTemplatePath($templateIdentifier);

        return $twig->render($templatePath, [
            'antelope' => $this->getFactory()->getAntelopeClient()->getAntelopeByName($names[0])
        ]);
    }

    /**
     * @param string|null $templateIdentifier
     *
     * @return string
     */
    protected function resolveTemplatePath(?string $templateIdentifier = null): string
    {
        $availableTemplates = $this->widgetConfiguration->getAvailableTemplates();
        if (!$templateIdentifier || !array_key_exists($templateIdentifier, $availableTemplates)) {
            $templateIdentifier = CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER;
        }

        return $availableTemplates[$templateIdentifier];
    }
}