<?php

namespace App\Mailers;

use App\Models\MailerModel;

class FormularioHomeMailer
{
  public static function send(string $to, array $data = null): bool
  {
    try {

      extract($data);
      ob_start();
      include(__DIR__ . "/../../views/mail/index.php");
      $email_body = ob_get_clean();

      $mailer = new MailerModel($to);
      $mailer->send($email_body);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }
}
