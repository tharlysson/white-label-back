<?php

declare(strict_types=1);

namespace App\Cliente\Application\UseCases;

use App\Cliente\Domain\Entities\Cliente;
use App\Cliente\Domain\Repositories\ClienteRepository;
use App\Cliente\Presentation\DTO\ClienteInput;

class ClienteUseCase
{
    public function save(ClienteInput $cliente, ClienteRepository $repository): string
    {
        $clienteObj = new Cliente(
            nome: $cliente->nome,
            email: $cliente->email,
            dataNascimento: $cliente->dataNascimento
        );

        $repository->save(
            $clienteObj
        );

        return $clienteObj->getId()->value;
    }

    public function findAll(ClienteRepository $repository): array
    {
        return $repository->findAll();
    }
}