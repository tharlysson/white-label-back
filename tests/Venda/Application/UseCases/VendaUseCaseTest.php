<?php

namespace Tests\Vendas\Application\UseCases;

use App\Cliente\Infra\Repositories\Memory\ClienteMemory;
use App\Produto\Infra\Repositories\Memory\ProdutoMemory;
use App\Shared\ValueObjects\Uuid;
use App\Venda\Application\UseCases\VendaUseCase;
use App\Venda\Infra\Repositories\Memory\VendaMemory;
use App\Venda\Presentation\DTO\VendaProdutoInput;
use Codeception\Test\Unit;

class VendaUseCaseTest extends Unit
{
    public function testRealizarVenda()
    {
        $vendorUseCase = new VendaUseCase();
        $vendorUseCase->realizarVenda(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            [
                new VendaProdutoInput(
                    new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
                    10
                ),
                new VendaProdutoInput(
                    new Uuid('f7cf4541-f7dd-4d68-9796-1d7a0165a08e'),
                    10
                )
            ],
            new VendaMemory(),
            new ClienteMemory(),
            new ProdutoMemory()
        );
        $this->assertTrue(true);
    }
}