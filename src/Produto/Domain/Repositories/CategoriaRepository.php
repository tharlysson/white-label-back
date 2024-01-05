<?php

namespace App\Produto\Domain\Repositories;

use App\Produto\Domain\Entities\Categoria;
use App\Shared\ValueObjects\Uuid;

interface CategoriaRepository
{
    public function findById(Uuid $id): ?Categoria;

    /**
     * @return Categoria[]
     */
    public function findAll(): array;

    public function save(Categoria $categoria): void;

    public function delete(Uuid $id): bool;

    public function update(Categoria $categoria): void;

}