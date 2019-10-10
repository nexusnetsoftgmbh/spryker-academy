<?php
declare(strict_types=1);

namespace Pyz\Yves\AntelopeSearch\Controller;


use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Client\AntelopeSearch\AntelopeSearchClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(string $name)
    {
        $antelope = $this->getClient()->getAntelopeByName($name);

        return $this->view(
            [
                'antelope' => $antelope,
            ],
            [],
            '@AntelopeSearch/views/index/index.twig'
        );
    }
}