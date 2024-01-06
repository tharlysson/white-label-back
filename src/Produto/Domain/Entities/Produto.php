<?php

declare(strict_types=1);

namespace App\Produto\Domain\Entities;

use App\Shared\Exceptions\DomainException;
use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Produto
{
    public function __construct(
        protected readonly Uuid $id = new Uuid(),
        protected readonly DateTime $dataCriacao = new DateTime(),
        protected string $nome = '',
        protected ?Datetime $dataAtualizacao = null,
        protected ?DateTime $dataExclusao = null,
        protected ?string $descricao = null,
        protected ?float $valorVarejo = null,
        protected ?float $estoque = null,
        protected ?Categoria $categoria = null,
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
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
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

    /**
     * @codeCoverageIgnore
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getValorVarejo(): ?float
    {
        return $this->valorVarejo;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setValorVarejo(?float $valorVarejo): void
    {
        $this->valorVarejo = $valorVarejo;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getEstoque(): ?float
    {
        return $this->estoque;
    }

    /**
     * @codeCoverageIgnore
     * @throws DomainException
     */
    public function setEstoque(?float $estoque): void
    {
        if ($estoque < 0) {
            throw new DomainException('O estoque não pode ser menor que 0.');
        }

        $this->estoque = $estoque;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setCategoria(?Categoria $categoria): void
    {
        $this->categoria = $categoria;
    }
}
