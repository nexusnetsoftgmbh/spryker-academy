<?php


namespace Pyz\Zed\Mail;


use Spryker\Zed\Mail\MailConfig as SpyMailConfig;

class MailConfig extends SpyMailConfig
{
    public const MAIL_SMTP_HOST = 'mail.smtp.host';
    public const MAIL_SMTP_PORT = 'mail.smtp.port';
    public const MAIL_SMTP_USER = 'mail.smtp.user';
    public const MAIL_SMTP_PASS = 'mail.smtp.pass';

    /**
     * @return string
     */
    public function getSmtpHost(): string
    {
        return $this->get(self::MAIL_SMTP_HOST, '127.0.0.1');
    }

    /**
     * @return string
     */
    public function getSmtpPort(): string
    {
        return $this->get(self::MAIL_SMTP_PORT, '25');
    }

    /**
     * @return string
     */
    public function getSmtpUser(): string
    {
        return $this->get(self::MAIL_SMTP_USER);
    }

    /**
     * @return string
     */
    public function getSmtpPass(): string
    {
        return $this->get(self::MAIL_SMTP_PASS);
    }
}