<?php

declare(strict_types=1);

namespace App\Produto\Presentation\DTO;

use App\Produto\Domain\Entities\Categoria;

class ProdutoInput
{
    public function __construct(
        public string $nome,
        public ?string $descricao = null,
        public ?float $valorVarejo = null,
        public ?float $estoque = null,
        public ?Categoria $categoria = null,
    ) {
    }
}