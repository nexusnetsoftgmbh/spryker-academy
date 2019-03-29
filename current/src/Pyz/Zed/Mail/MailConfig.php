<?php
declare(strict_types=1);

namespace Pyz\Zed\Mail;


use Pyz\Shared\Mail\MailConstants;
use Spryker\Zed\Mail\MailConfig as SpyMailConfig;

class MailConfig extends SpyMailConfig
{
    /**
     * @return string
     */
    public function getSmtpUsername(): string
    {
        return $this->get(MailConstants::SMTP_USERNAME, '');
    }

    /**
     * @return string
     */
    public function getSmtpPassword(): string
    {
        return $this->get(MailConstants::SMTP_PASSWORD, '');
    }
}