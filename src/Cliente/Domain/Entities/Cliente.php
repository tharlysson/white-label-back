<?php

declare(strict_types=1);

namespace App\Cliente\Domain\Entities;

use App\Shared\ValueObjects\Uuid;
use DateTime;

final class Cliente
{
    public function __construct(
        protected readonly Uuid $id = new Uuid(),
        protected readonly DateTime $dataCriacao = new DateTime(),
        protected string $nome = '',
        protected ?string $email = null,
        protected ?DateTime $dataNascimento = null,
        protected ?string $documento = null,
        protected ?string $telefone = null,
        protected ?string $celular = null,
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDataNascimento(?DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDocumento(?string $documento): void
    {
        $this->documento = $documento;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getCelular(): ?string
    {
        return $this->celular;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setCelular(?string $celular): void
    {
        $this->celular = $celular;
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
