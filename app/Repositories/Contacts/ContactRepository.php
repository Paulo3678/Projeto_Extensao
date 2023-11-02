<?php

namespace App\Repositories\Contacts;

use App\Dtos\CreateNewContactDto;

class ContactRepository implements IContactRepository
{

    public function create(CreateNewContactDto $dto)
    {
        echo "Criando um novo contato no banco de dados";
    }

    public function listAll()
    {
        return [];
    }

    public function listAllPaginated(int $paginaAtual = 1)
    {
        return [];
    }

    public function coutItens()
    {
        return 0;
    }

    public function countByHorario(string $horario)
    {
        return 0;
    }
}
