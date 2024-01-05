<?php

declare(strict_types=1);

namespace App\Cliente\Application\UseCases;

use App\Cliente\Domain\Entities\Cliente;
use App\Cliente\Domain\Repositories\ClienteRepository;
use App\Cliente\Presentation\DTO\ClienteInput;
use App\Shared\ValueObjects\Uuid;

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

    public function findById(Uuid $id, ClienteRepository $repository): ?Cliente
    {
        return $repository->findById($id);
    }

    public function update(Uuid $id, ClienteInput $cliente, ClienteRepository $repository): ?Cliente
    {
        $clienteRepo = $repository->findById($id);

        if (!$clienteRepo) {
            return null;
        }

        $clienteRepo->setNome($cliente->nome);
        $clienteRepo->setEmail($cliente->email);
        $clienteRepo->setDataNascimento($cliente->dataNascimento);

        $repository->update($clienteRepo);

        return $clienteRepo;
    }

    public function delete(Uuid $id, ClienteRepository $repository): bool
    {
        return $repository->delete($id);
    }
}