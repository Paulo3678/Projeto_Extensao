<?php

namespace App\Models;

use App\Dtos\CreateNewContactDto;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailerModel
{
    private $mail;
    private $from;
    private $name;
    private $to;
    private $subject;
    private $template;


    public function __construct(string $emailSendTo)
    {
        $this->mail = new PHPMailer();

        // CARREGANDO DADOS DO SERVIDOR
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = SMPT_HOST;
        $this->mail->Username = SMPT_EMAIL_HOST;
        $this->mail->Password = SMPT_MAIL_PASSWORD;
        $this->mail->SMTPSecure = SMTP_SECURE;
        $this->mail->SMTPAutoTLS = SMTP_SECURE;
        $this->mail->Port = SMTP_PORT;
        $this->mail->CharSet = "UTF-8";

        $this->from = SMPT_EMAIL_HOST;
        $this->name = SMTP_MAIL_NAME;

        $this->to = $emailSendTo;
        $this->subject = "ASSUNTO DO E-MAIL";
    }

    public function send(string $template)
    {
        try {
            $this->template = $template;
            $this->mail->setFrom($this->from, $this->name);
            // QUEM VAI RECEBER
            $this->mail->addAddress($this->to);
            // ASSUNTO DO E-MAIL
            $this->mail->Subject = $this->subject;
            $this->mail->isHTML(true);

            // CORPO DO E-MAIL
            $this->mail->Body = $this->template;

            if ($this->mail->send()) {
                return true;
            }
        } catch (Exception $ex) {
            throw new Exception("Erro ao tentar enviar e-mail");
        }
    }
}
