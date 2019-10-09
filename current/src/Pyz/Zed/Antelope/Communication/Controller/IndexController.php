<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Communication\Controller;


use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\Antelope\Communication\AntelopeCommunicationFactory getFactory()
 */
class IndexController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        $table = $this->getFactory()
                      ->createAntelopeTable();
        return $this->viewResponse([
            'antelopeTable' => $table->render(),
        ]);
    }
    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function tableAction()
    {
        $table = $this->getFactory()
                      ->createAntelopeTable();
        return $this->jsonResponse($table->fetchData());
    }
}