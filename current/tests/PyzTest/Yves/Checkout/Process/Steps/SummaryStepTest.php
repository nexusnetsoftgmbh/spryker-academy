<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Checkout\Process\Steps;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\ItemBuilder;
use Generated\Shared\DataBuilder\PaymentBuilder;
use Generated\Shared\DataBuilder\QuoteBuilder;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use SprykerShop\Yves\CheckoutPage\CheckoutPageConfig;
use SprykerShop\Yves\CheckoutPage\Dependency\Client\CheckoutPageToProductBundleClientInterface;
use SprykerShop\Yves\CheckoutPage\Dependency\Service\CheckoutPageToShipmentServiceInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\SummaryStep;
use Symfony\Component\HttpFoundation\Request;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Yves
 * @group Checkout
 * @group Process
 * @group Steps
 * @group SummaryStepTest
 * Add your own group annotations below this line
 */
class SummaryStepTest extends Unit
{
    /**
     * @return void
     */
    public function testPostConditionShouldReturnWhenQuoteReadyForSummaryDisplay()
    {
        $summaryStep = $this->createSummaryStep();

        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setBillingAddress(new AddressTransfer());

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('test');

        $quoteTransfer->setPayment($paymentTransfer);
        $quoteTransfer->setShipment(new ShipmentTransfer());

        $this->assertTrue($summaryStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testPostConditionShouldReturnWhenQuoteReadyForSummaryDisplayWithItemLevelShipment()
    {
        $summaryStep = $this->createSummaryStep();

        $quoteTransfer = (new QuoteBuilder())
            ->withBillingAddress()
            ->withItem((new ItemBuilder())->withShipment())
            ->build();

        $paymentTransfer = (new PaymentBuilder([PaymentTransfer::PAYMENT_PROVIDER => 'test']))->build();
        $quoteTransfer->setPayment($paymentTransfer);

        $this->assertTrue($summaryStep->postCondition($quoteTransfer));
    }

    /**
     * @return void
     */
    public function testRequireInputShouldBeTrue()
    {
        $summaryStep = $this->createSummaryStep();

        $this->assertTrue($summaryStep->requireInput(new QuoteTransfer()));
    }

    /**
     * @return \SprykerShop\Yves\CheckoutPage\Process\Steps\SummaryStep
     */
    protected function createSummaryStep()
    {
        $productBundleClient = $this->createProductBundleClient();

        return new SummaryStep(
            $productBundleClient,
            $this->createShipmentServiceMock(),
            $this->createCheckoutPageConfigMock(),
            'shipment',
            'escape_route'
        );
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\SprykerShop\Yves\CheckoutPage\Dependency\Client\CheckoutPageToProductBundleClientInterface
     */
    protected function createProductBundleClient()
    {
        return $this->getMockBuilder(CheckoutPageToProductBundleClientInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\SprykerShop\Yves\CheckoutPage\Dependency\Service\CheckoutPageToShipmentServiceInterface
     */
    protected function createShipmentServiceMock()
    {
        return $this->getMockBuilder(CheckoutPageToShipmentServiceInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\SprykerShop\Yves\CheckoutPage\CheckoutPageConfig
     */
    protected function createCheckoutPageConfigMock()
    {
        $mock = $this->getMockBuilder(CheckoutPageConfig::class)->getMock();

        return $mock;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function createRequest()
    {
        return Request::createFromGlobals();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected function createShipmentMock()
    {
        return $this->getMockBuilder(StepHandlerPluginInterface::class)->getMock();
    }
}
