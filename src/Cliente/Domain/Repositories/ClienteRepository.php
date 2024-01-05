<?php

declare(strict_types=1);

namespace App\Cliente\Domain\Repositories;

use App\Cliente\Domain\Entities\Cliente;
use App\Shared\ValueObjects\Uuid;

interface ClienteRepository
{
    public function findById(Uuid $id): ?Cliente;

    /**
     * @return Cliente[]
     */
    public function findAll(): array;

    public function save(Cliente $cliente): void;

    public function delete(Uuid $id): void;

    public function update(Cliente $cliente): void;
}