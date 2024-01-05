<?php

declare(strict_types=1);

namespace App\Produto\Domain\Entities;

use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Categoria
{
    public function __construct(
        protected readonly Uuid $id = new Uuid(),
        protected readonly DateTime $dataCriacao = new DateTime(),
        protected string $nome = '',
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
}