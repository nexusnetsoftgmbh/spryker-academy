<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Mail;

use Spryker\Zed\AuthMailConnector\Communication\Plugin\Mail\RestorePasswordMailTypePlugin;
use Spryker\Zed\AvailabilityNotification\Communication\Plugin\Mail\AvailabilityNotificationMailTypePlugin;
use Spryker\Zed\AvailabilityNotification\Communication\Plugin\Mail\AvailabilityNotificationSubscriptionMailTypePlugin;
use Spryker\Zed\AvailabilityNotification\Communication\Plugin\Mail\AvailabilityNotificationUnsubscribedMailTypePlugin;
use Spryker\Zed\CompanyMailConnector\Communication\Plugin\Mail\CompanyStatusMailTypePlugin;
use Spryker\Zed\CompanyUserInvitation\Communication\Plugin\Mail\CompanyUserInvitationMailTypePlugin;
use Spryker\Zed\Customer\Communication\Plugin\Mail\CustomerRegistrationMailTypePlugin;
use Spryker\Zed\Customer\Communication\Plugin\Mail\CustomerRestoredPasswordConfirmationMailTypePlugin;
use Spryker\Zed\Customer\Communication\Plugin\Mail\CustomerRestorePasswordMailTypePlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Mail\Business\Model\Mail\MailTypeCollectionAddInterface;
use Spryker\Zed\Mail\Business\Model\Provider\MailProviderCollectionAddInterface;
use Spryker\Zed\Mail\Communication\Plugin\MailProviderPlugin;
use Spryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge;
use Spryker\Zed\Mail\MailConfig;
use Spryker\Zed\Mail\MailDependencyProvider as SprykerMailDependencyProvider;
use Spryker\Zed\Newsletter\Communication\Plugin\Mail\NewsletterSubscribedMailTypePlugin;
use Spryker\Zed\Newsletter\Communication\Plugin\Mail\NewsletterUnsubscribedMailTypePlugin;
use Spryker\Zed\Oms\Communication\Plugin\Mail\OrderConfirmationMailTypePlugin;
use Spryker\Zed\Oms\Communication\Plugin\Mail\OrderShippedMailTypePlugin;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

/**
 * @method \Pyz\Zed\Mail\MailConfig getConfig()
 */
class MailDependencyProvider extends SprykerMailDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container->extend(static::MAIL_TYPE_COLLECTION, function (MailTypeCollectionAddInterface $mailCollection) {
            $mailCollection
                ->add(new CustomerRegistrationMailTypePlugin())
                ->add(new CustomerRestorePasswordMailTypePlugin())
                ->add(new CustomerRestoredPasswordConfirmationMailTypePlugin())
                ->add(new NewsletterSubscribedMailTypePlugin())
                ->add(new NewsletterUnsubscribedMailTypePlugin())
                ->add(new OrderConfirmationMailTypePlugin())
                ->add(new OrderShippedMailTypePlugin())
                ->add(new CompanyUserInvitationMailTypePlugin())
                ->add(new CompanyStatusMailTypePlugin())
                ->add(new AvailabilityNotificationUnsubscribedMailTypePlugin())
                ->add(new AvailabilityNotificationSubscriptionMailTypePlugin())
                ->add(new AvailabilityNotificationMailTypePlugin())
                ->add(new RestorePasswordMailTypePlugin());

            return $mailCollection;
        });

        $container->extend(self::MAIL_PROVIDER_COLLECTION, function (MailProviderCollectionAddInterface $mailProviderCollection) {
            $mailProviderCollection
                ->addProvider(new MailProviderPlugin(), [
                    MailConfig::MAIL_TYPE_ALL,
                    CompanyUserInvitationMailTypePlugin::MAIL_TYPE,
                ]);
            return $mailProviderCollection;
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMailer(Container $container)
    {
        $container[static::MAILER] = function () {
            $message = new Swift_Message();
            $transport = new Swift_SmtpTransport(
                $this->getConfig()->getSmtpHost(),
                $this->getConfig()->getSmtpPort()
            );

            $transport->setUsername($this->getConfig()->getSmtpUsername());
            $transport->setPassword($this->getConfig()->getSmtpPassword());

            $mailer = new Swift_Mailer($transport);

            $mailerBridge = new MailToMailerBridge($message, $mailer);

            return $mailerBridge;
        };

        return $container;
    }


}
