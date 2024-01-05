<?php

declare(strict_types=1);

namespace App\Empresa\Domain\Entities;

use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Empresa
{
    public function __construct(
        protected readonly Uuid $id,
        protected readonly DateTime $dataCriacao,
        protected string $nome,
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
    ) {
    }
}