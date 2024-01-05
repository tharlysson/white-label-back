<?php

declare(strict_types=1);

namespace App\Produto\Domain\Entities;

use App\Empresa\Domain\Entities\Empresa;
use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Produto
{
    public function __construct(
        protected readonly Uuid $id,
        protected readonly DateTime $dataCriacao,
        protected string $nome,
        protected Empresa $empresa,
        protected bool $ativo = true,
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
        protected ?string $descricao = null,
        protected ?string $modelo = null,
        protected ?string $codigoBarras = null,
        protected ?string $codigoInterno = null,
        protected ?string $codigoBalanca = null,
        protected ?float $valorVarejo = null,
        protected ?float $estoque = null,
        protected ?DateTime $dataUltimaCompra = null,
        protected ?DateTime $dataUltimaVenda = null,
        protected ?float $ultimoValorCompra = null,
        protected ?Categoria $categoria = null,
    ) {
    }
}
