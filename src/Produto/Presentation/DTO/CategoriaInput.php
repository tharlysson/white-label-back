<?php

declare(strict_types=1);

namespace App\Produto\Presentation\DTO;

final readonly class CategoriaInput
{
    public function __construct(
        public string $nome,
    ) {
    }
}