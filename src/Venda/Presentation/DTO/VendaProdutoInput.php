<?php

declare(strict_types=1);

namespace App\Venda\Presentation\DTO;

use App\Shared\ValueObjects\Uuid;

final readonly class VendaProdutoInput
{
    public function __construct(
        public Uuid $produtoId,
        public float $quantidade
    ) {
    }
}