<?php

declare(strict_types=1);

namespace App\Venda\Domain\Entities;

use App\Cliente\Domain\Entities\Cliente;
use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Venda
{
    public function __construct(
        protected array $produtos,
        protected float $valor,
        protected Cliente $cliente,
        protected readonly Uuid $id = new Uuid(),
        protected readonly DateTime $dataCriacao = new DateTime(),
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
    ) {
    }

    /**
     * @codeCoverageIgnore
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDataCriacao(): DateTime
    {
        return $this->dataCriacao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProdutos(): array
    {
        return $this->produtos;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setProdutos(array $produtos): void
    {
        $this->produtos = $produtos;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDataAtualizacao(): ?DateTime
    {
        return $this->dataAtualizacao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDataAtualizacao(?DateTime $dataAtualizacao): void
    {
        $this->dataAtualizacao = $dataAtualizacao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDataExclusao(): ?DateTime
    {
        return $this->dataExclusao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDataExclusao(?DateTime $dataExclusao): void
    {
        $this->dataExclusao = $dataExclusao;
    }
}