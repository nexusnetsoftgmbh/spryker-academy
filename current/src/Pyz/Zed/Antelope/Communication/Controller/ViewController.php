<?php
declare(strict_types=1);

namespace Pyz\Zed\Antelope\Communication\Controller;


use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ViewController extends AbstractController
{
    public const PARAM_ID_ANTELOPE = 'id-antelope';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idAntelope = $request->get(static::PARAM_ID_ANTELOPE);
        if (empty($idAntelope)) {
            return $this->redirectResponse('/antelope');
        }
        $idAntelope = $this->castId($idAntelope);
        $antelopeTransfer = $this->loadAntelopeTransfer($idAntelope);
        return $this->viewResponse([
            'antelope' => $antelopeTransfer,
            'idAntelope' => $idAntelope,
        ]);
    }

    /**
     * @return \Generated\Shared\Transfer\AntelopeTransfer
     */
    protected function createAntelopeTransfer()
    {
        return new AntelopeTransfer();
    }

    /**
     * @param int $idAntelope
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer
     */
    protected function loadAntelopeTransfer($idAntelope)
    {
        $antelopeTransfer = $this->createAntelopeTransfer();
        $antelopeTransfer->setIdAntelope($idAntelope);
        $antelopeTransfer = $this->getFacade()->getAntelope($antelopeTransfer);
        return $antelopeTransfer;
    }
}