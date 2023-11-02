<?php

namespace App\Dtos;

class CreateNewContactDto
{
    public function __construct(
        private string $nome,
        private string $emailSendTo,
        private string $telefone,
        private string $horarioVaiVir
    ) {
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmailSendTo()
    {
        return $this->emailSendTo;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getHorarioVaiVir()
    {
        return $this->horarioVaiVir;
    }
}
