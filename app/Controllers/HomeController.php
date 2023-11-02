<?php

namespace App\Controllers;

use App\Models\MailerModel;
use App\Controllers\ControllerBase;
use App\Dtos\CreateNewContactDto;
use App\Mailers\FormularioHomeMailer;
use App\Repositories\Contacts\ContactRepository;
use Exception;
use Laminas\Diactoros\Response\HtmlResponse;

class HomeController extends ControllerBase
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ContactRepository();
    }

    public function index()
    {
        $viewContent = $this->view("index.php");
        return new HtmlResponse($viewContent);
    }

    public function enviarContato()
    {
        try {
            /** @var CreateNewContactDto $dto */
            $dto = $this->loadData();
            $this->repository->create($dto);

            FormularioHomeMailer::send($dto->getEmailSendTo(), ["remetente" => $dto->getNome()]);

            $this->viewMessage("success", "E-mail enviado com sucesso");
            return header("Location: /");
        } catch (Exception $ex) {
            $this->viewMessage("error", "Erro ao tentar enviar e-mail");
            return header("Location: /");
        }
    }

    private function loadData(): CreateNewContactDto
    {
        if (empty($_POST["nome"]) || empty($_POST["email"] || empty($_POST["horarioVaiVir"]) || empty($_POST["telfone"]))) {
            throw new Exception("Campos não encontrados");
        }
        return new CreateNewContactDto($_POST["nome"], $_POST["email"], $_POST["telefone"], $_POST["horarioVaiVir"]);
    }
}
