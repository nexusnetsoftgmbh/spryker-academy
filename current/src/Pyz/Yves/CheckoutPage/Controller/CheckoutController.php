<?php

namespace Pyz\Yves\CheckoutPage\Controller;

use SprykerShop\Yves\CheckoutPage\Controller\CheckoutController as SprykerCheckoutController;
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

        return $this->view(
            $response,
            $this->getFactory()->getCustomerPageWidgetPlugins(),
            '@CheckoutPage/views/checkout/voucher/voucher.twig'
        );
    }
}
