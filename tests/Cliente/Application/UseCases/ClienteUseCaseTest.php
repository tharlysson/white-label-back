<?php

namespace Tests\Cliente\Application\UseCases;

use App\Cliente\Application\UseCases\ClienteUseCase;
use App\Cliente\Domain\Entities\Cliente;
use App\Cliente\Infra\Repositories\Memory\ClienteMemory;
use App\Cliente\Presentation\DTO\ClienteInput;
use Codeception\Test\Unit;

class ClienteUseCaseTest extends Unit
{
    public function testCriarCliente()
    {
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->save(
            new ClienteInput(
                nome: 'Teste',
                email: 'teste@teste.com',
                dataNascimento: new \DateTime('1990-01-01')
            ),
            new ClienteMemory()
        );

        $this->assertTrue(is_string($return));
        $this->assertTrue(preg_match('/[a-f0-9]{8}-([a-f0-9]{4}-){3}[a-f0-9]{12}/', $return) === 1);
    }

    public function testBuscarTodosOsClientes()
    {
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->findAll(new ClienteMemory());
        $this->assertTrue(is_array($return));
        $this->assertTrue(count($return) == 3);
        $this->assertInstanceOf(Cliente::class, reset($return));
    }
}