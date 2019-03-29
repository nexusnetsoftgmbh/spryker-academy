<?php
declare(strict_types=1);

namespace Pyz\Shared\Mail;


use Spryker\Shared\Mail\MailConstants as SpyMailConstants;

interface MailConstants extends SpyMailConstants
{
    public const SMTP_USERNAME = 'mail.smtp.username';
    public const SMTP_PASSWORD = 'mail.smtp.password';
}