<?php

declare(strict_types=1);

namespace App\Venda\Domain\Repositories;

use App\Shared\ValueObjects\Uuid;
use App\Venda\Domain\Entities\Venda;

interface VendaRepository
{
    public function findById(Uuid $id): ?Venda;

    /**
     * @return Venda[]
     */
    public function findAll(): array;

    public function save(Venda $venda): void;

    public function delete(Uuid $id): bool;

    public function update(Venda $venda): void;
}