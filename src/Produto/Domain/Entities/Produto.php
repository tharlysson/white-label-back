<?php

declare(strict_types=1);

namespace App\Produto\Domain\Entities;

use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Produto
{
    public function __construct(
        protected readonly Uuid $id,
        protected readonly DateTime $dataCriacao,
        protected string $nome,
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
        protected ?string $descricao = null,
        protected ?float $valorVarejo = null,
        protected ?float $estoque = null,
        protected ?Categoria $categoria = null,
    ) {
    }
}
