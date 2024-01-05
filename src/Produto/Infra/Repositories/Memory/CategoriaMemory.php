<?php

declare(strict_types=1);

namespace App\Produto\Infra\Repositories\Memory;

use App\Produto\Domain\Entities\Categoria;
use App\Produto\Domain\Repositories\CategoriaRepository;
use App\Shared\ValueObjects\Uuid;

class CategoriaMemory implements CategoriaRepository
{

    /** @var Categoria[] */
    private array $categorias = [];

    public function __construct()
    {
        $this->categorias[] = new Categoria(
            id: new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            dataCriacao: new \DateTime('2020-12-02'),
            nome: 'Bebidas',
        );

        $this->categorias[] = new Categoria(
            id: new Uuid('f7cf4541-f7dd-4d68-9796-1d7a0165a08e'),
            dataCriacao: new \DateTime('2021-10-07'),
            nome: 'Alimentos',
        );

        $this->categorias[] = new Categoria(
            id: new Uuid('5754abda-f50d-4a04-ac98-188c67aa4c38'),
            dataCriacao: new \DateTime('2022-01-20'),
            nome: 'Materiais de Limpeza',
        );
    }

    public function findById(Uuid $id): ?Categoria
    {
        foreach ($this->categorias as $categoria) {
            if ($categoria->getId()->equals($id)) {
                return $categoria;
            }
        }

        return null;
    }

    public function findAll(): array
    {
        return $this->categorias;
    }

    public function save(Categoria $categoria): void
    {
        $this->categorias[] = $categoria;
    }

    public function delete(Uuid $id): bool
    {
        foreach ($this->categorias as $key => $categoria) {
            if ($categoria->getId()->equals($id)) {
                unset($this->categorias[$key]);
                return true;
            }
        }

        return false;
    }

    public function update(Categoria $categoria): void
    {
        foreach ($this->categorias as $key => $item) {
            if ($item->getId()->equals($categoria->getId())) {
                $this->categorias[$key] = $categoria;
            }
        }
    }
}