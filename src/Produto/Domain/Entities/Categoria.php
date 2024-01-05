<?php

declare(strict_types=1);

namespace App\Produto\Domain\Entities;

use App\Empresa\Domain\Entities\Empresa;
use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Categoria
{
    public function __construct(
        protected readonly Uuid $id,
        protected readonly DateTime $dataCriacao,
        protected string $nome,
        protected Empresa $empresa,
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
    ) {
    }
}