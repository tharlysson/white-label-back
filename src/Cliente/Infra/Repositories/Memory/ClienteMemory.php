<?php

declare(strict_types=1);

namespace App\Cliente\Infra\Repositories\Memory;

use App\Cliente\Domain\Entities\Cliente;
use App\Cliente\Domain\Repositories\ClienteRepository;
use App\Shared\ValueObjects\Uuid;

class ClienteMemory implements ClienteRepository
{
    /** @var Cliente[] */
    private array $clientes = [];

    public function __construct()
    {
        $this->clientes[] = new Cliente(
            id: new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            dataCriacao: new \DateTime('2020-12-02'),
            nome: 'João',
            saldo: 1000,
            email: 'joao@email.com'
        );

        $this->clientes[] = new Cliente(
            id: new Uuid('f7cf4541-f7dd-4d68-9796-1d7a0165a08e'),
            dataCriacao: new \DateTime('2021-10-07'),
            nome: 'Maria',
            email: 'maria@email.com'
        );

        $this->clientes[] = new Cliente(
            id: new Uuid('5754abda-f50d-4a04-ac98-188c67aa4c38'),
            dataCriacao: new \DateTime('2022-01-20'),
            nome: 'José',
            email: 'jose@email.com'
        );
    }

    public function findById(Uuid $id): ?Cliente
    {
        foreach ($this->clientes as $cliente) {
            if ($cliente->getId()->equals($id)) {
                return $cliente;
            }
        }

        return null;
    }

    public function findAll(): array
    {
        return $this->clientes;
    }

    public function save(Cliente $cliente): void
    {
        $this->clientes[] = $cliente;
    }

    public function delete(Uuid $id): bool
    {
        foreach ($this->clientes as $key => $cliente) {
            if ($cliente->getId()->equals($id)) {
                unset($this->clientes[$key]);
                return true;
            }
        }

        return false;
    }

    public function update(Cliente $cliente): void
    {
        foreach ($this->clientes as $key => $item) {
            if ($item->getId()->equals($cliente->getId())) {
                $this->clientes[$key] = $cliente;
            }
        }
    }
}
