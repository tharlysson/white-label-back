<?php

declare(strict_types=1);

namespace App\Produto\Infra\Repositories\Memory;

use App\Produto\Domain\Entities\Categoria;
use App\Produto\Domain\Entities\Produto;
use App\Produto\Domain\Repositories\ProdutoRepository;
use App\Shared\ValueObjects\Uuid;

class ProdutoMemory implements ProdutoRepository
{

    /** @var Produto[] */
    private array $produtos = [];

    public function __construct()
    {
        $this->produtos[] = new Produto(
            id: new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            dataCriacao: new \DateTime('2020-12-02'),
            nome: 'Coca-Cola',
            descricao: 'Coca-Cola lata 350ml',
            valorVarejo: 3.50,
            estoque: 10,
            categoria: new Categoria(
                id: new Uuid('8dcdbb34-0016-4830-9b5b-42bfc7cc8a98'),
                dataCriacao: new \DateTime('2020-12-02'),
                nome: 'Bebidas',
            )

        );

        $this->produtos[] = new Produto(
            id: new Uuid('f7cf4541-f7dd-4d68-9796-1d7a0165a08e'),
            dataCriacao: new \DateTime('2021-10-07'),
            nome: 'Arroz',
            descricao: 'Arroz integral 1kg',
            valorVarejo: 5.50,
            estoque: 20,
            categoria: new Categoria(
                id: new Uuid('796c902d-142e-4409-9d7d-df82f711ac80'),
                dataCriacao: new \DateTime('2020-12-02'),
                nome: 'Alimentos',
            )
        );

        $this->produtos[] = new Produto(
            id: new Uuid('5754abda-f50d-4a04-ac98-188c67aa4c38'),
            dataCriacao: new \DateTime('2022-01-20'),
            nome: 'Pinho Sol',
            descricao: 'Pinho Sol 1L',
            valorVarejo: 7.50,
            estoque: 10,
            categoria: new Categoria(
                id: new Uuid('486752c0-adbc-47a8-924b-1608ab7d6788'),
                dataCriacao: new \DateTime('2020-12-02'),
                nome: 'Materiais de Limpeza',
            )
        );
    }

    public function findById(Uuid $id): ?Produto
    {
        foreach ($this->produtos as $produto) {
            if ($produto->getId()->equals($id)) {
                return $produto;
            }
        }

        return null;
    }

    public function findAll(): array
    {
        return $this->produtos;
    }

    public function save(Produto $produto): void
    {
        $this->produtos[] = $produto;
    }

    public function delete(Uuid $id): bool
    {
        foreach ($this->produtos as $key => $produto) {
            if ($produto->getId()->equals($id)) {
                unset($this->produtos[$key]);
                return true;
            }
        }

        return false;
    }

    public function update(Produto $produto): void
    {
        foreach ($this->produtos as $key => $item) {
            if ($item->getId()->equals($produto->getId())) {
                $this->produtos[$key] = $produto;
            }
        }
    }
}