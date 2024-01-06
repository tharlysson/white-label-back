<?php

declare(strict_types=1);

namespace App\Venda\Infra\Repositories\Memory;

use App\Venda\Domain\Entities\Venda;
use App\Shared\ValueObjects\Uuid;
use App\Venda\Domain\Repositories\VendaRepository;

class VendaMemory implements VendaRepository
{

    /**
     * @var Venda[]
     */
    private array $vendas = [];

    public function findById(Uuid $id): ?Venda
    {
        foreach ($this->vendas as $venda) {
            if ($venda->getId()->equals($id)) {
                return $venda;
            }
        }

        return null;
    }

    public function findAll(): array
    {
        return $this->vendas;
    }

    public function save(Venda $venda): void
    {
        $this->vendas[] = $venda;
    }

    public function delete(Uuid $id): bool
    {
        foreach ($this->vendas as $key => $venda) {
            if ($venda->getId()->equals($id)) {
                unset($this->vendas[$key]);
                return true;
            }
        }

        return false;
    }

    public function update(Venda $venda): void
    {
        foreach ($this->vendas as $key => $item) {
            if ($item->getId()->equals($venda->getId())) {
                $this->vendas[$key] = $venda;
            }
        }
    }
}