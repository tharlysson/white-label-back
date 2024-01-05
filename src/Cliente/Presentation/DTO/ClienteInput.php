<?php

declare(strict_types=1);

namespace App\Cliente\Presentation\DTO;

use DateTime;

final readonly class ClienteInput
{
    public function __construct(
        public string $nome,
        public ?string $email = null,
        public ?DateTime $dataNascimento = null,
        public ?string $documento = null,
        public ?string $telefone = null,
        public ?string $celular = null,
    ) {
    }
}