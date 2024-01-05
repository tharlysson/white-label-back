<?php

namespace App\Empresa\Domain\Repositories;

use App\Empresa\Domain\Entities\Empresa;
use App\Shared\ValueObjects\Uuid;

interface EmpresaRepository
{
    public function findById(Uuid $id): ?Empresa;

    /**
     * @return Empresa[]
     */
    public function findAll(): array;

    public function save(Empresa $categoria): void;

    public function delete(Uuid $id): void;

    public function update(Empresa $categoria): void;

}