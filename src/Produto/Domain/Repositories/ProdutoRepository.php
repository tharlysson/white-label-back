<?php

namespace App\Produto\Domain\Repositories;

use App\Produto\Domain\Entities\Produto;
use App\Shared\ValueObjects\Uuid;

interface ProdutoRepository
{
    public function findById(Uuid $id): ?Produto;

    /**
     * @return Produto[]
     */
    public function findAll(): array;

    public function save(Produto $produto): void;

    public function delete(Uuid $id): void;

    public function update(Produto $produto): void;

}