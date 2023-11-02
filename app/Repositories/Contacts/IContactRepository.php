<?php

namespace App\Repositories\Contacts;

use App\Dtos\CreateNewContactDto;

interface IContactRepository
{
    public function create(CreateNewContactDto $dto);
    public function listAll();
    public function listAllPaginated();
    public function coutItens();
    public function countByHorario(string $horario);
}
