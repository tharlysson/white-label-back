<?php

declare(strict_types=1);

namespace App\Produto\Application\UseCases;

use App\Produto\Domain\Entities\Categoria;
use App\Produto\Domain\Repositories\CategoriaRepository;
use App\Produto\Presentation\DTO\CategoriaInput;
use App\Shared\ValueObjects\Uuid;

class CategoriaUseCase
{
    public function save(CategoriaInput $categoria, CategoriaRepository $repository): string
    {
        $categoriaObj = new Categoria(
            nome: $categoria->nome
        );

        $repository->save(
            $categoriaObj
        );

        return $categoriaObj->getId()->value;
    }

    public function findAll(CategoriaRepository $repository): array
    {
        return $repository->findAll();
    }

    public function findById(Uuid $id, CategoriaRepository $repository): ?Categoria
    {
        return $repository->findById($id);
    }

    public function update(Uuid $id, CategoriaInput $categoria, CategoriaRepository $repository): ?Categoria
    {
        $categoriaRepo = $repository->findById($id);

        if (!$categoriaRepo) {
            return null;
        }

        $categoriaRepo->setNome($categoria->nome);

        $repository->update($categoriaRepo);

        return $categoriaRepo;
    }

    public function delete(Uuid $id, CategoriaRepository $repository): bool
    {
        return $repository->delete($id);
    }
}