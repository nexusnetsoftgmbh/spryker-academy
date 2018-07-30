<?php

namespace Pyz\Yves\CheckoutPage\Controller;

use Pyz\Yves\CheckoutPage\Plugin\Provider\CheckoutPageControllerProvider;
use SprykerShop\Yves\CheckoutPage\Controller\CheckoutController as SprykerCheckoutController;
use SprykerShop\Yves\DiscountWidget\Form\CheckoutVoucherForm;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\CheckoutPage\CheckoutPageFactory getFactory()
 */
class CheckoutController extends SprykerCheckoutController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return mixed
     */
    public function voucherAction(Request $request)
    {
        $response = $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                 ->createCheckoutFormFactory()
                 ->createVoucherFormCollection()
        );

        if (!is_array($response)) {
            return $response;
        }

//        echo '<pre>';
//        dump($response);
//        echo '</pre>';
//        exit;
        return $this->view(
            $response,
            $this->getFactory()->getCustomerPageWidgetPlugins(),
            '@CheckoutPage/views/checkout/voucher/voucher.twig'
        );
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addVoucherAction(Request $request)
    {
        $form = $this->getFactory()
                     ->getCheckoutVoucherForm()
                     ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voucherCode = $form->get(CheckoutVoucherForm::FIELD_VOUCHER_DISCOUNTS)->getData();

            $this->getFactory()
                 ->createVoucherHandler()
                 ->add($voucherCode);
        }

        return $this->redirectResponseInternal(CheckoutPageControllerProvider::CHECKOUT_SUMMARY);
    }
}
