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

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getDataCriacao(): DateTime
    {
        return $this->dataCriacao;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(?string $documento): void
    {
        $this->documento = $documento;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): void
    {
        $this->celular = $celular;
    }

    public function getDataAtualizacao(): ?DateTime
    {
        return $this->dataAtualizacao;
    }

    public function setDataAtualizacao(?DateTime $dataAtualizacao): void
    {
        $this->dataAtualizacao = $dataAtualizacao;
    }

    public function getDataExclusao(): ?DateTime
    {
        return $this->dataExclusao;
    }

    public function setDataExclusao(?DateTime $dataExclusao): void
    {
        $this->dataExclusao = $dataExclusao;
    }
}
