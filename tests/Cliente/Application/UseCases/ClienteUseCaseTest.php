<?php

namespace Tests\Cliente\Application\UseCases;

use App\Cliente\Application\UseCases\ClienteUseCase;
use App\Cliente\Domain\Entities\Cliente;
use App\Cliente\Infra\Repositories\Memory\ClienteMemory;
use App\Cliente\Presentation\DTO\ClienteInput;
use App\Shared\ValueObjects\Uuid;
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

    public function testRetornarPorId()
    {
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new ClienteMemory()
        );

        $this->assertInstanceOf(Cliente::class, $return);
        $this->assertEquals('João', $return->getNome());
    }

    public function testAtualizarCliente()
    {
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->update(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new ClienteInput(
                nome: 'Teste',
                email: 'XXXXXXXXXXXXXXX',
                dataNascimento: new \DateTime('1990-01-01')
            ),
            new ClienteMemory()
        );

        $this->assertInstanceOf(Cliente::class, $return);
        $this->assertEquals('XXXXXXXXXXXXXXX', $return->getEmail());
        $this->assertEquals(new \DateTime('1990-01-01'), $return->getDataNascimento());
    }

    public function testAtualizarClienteInexistente()
    {
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->update(
            new Uuid(),
            new ClienteInput(
                nome: 'Teste',
                email: 'XXXXXXXXXXXXXXX',
                dataNascimento: new \DateTime('1990-01-01')
            ),
            new ClienteMemory()
        );

        $this->assertNull($return);
    }

    public function testDeletarCliente()
    {
        $repositorio = new ClienteMemory();
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->delete(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertTrue($return);

        $return = $clienteUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertNull($return);
    }

    public function testDeletarClienteInexistente()
    {
        $repositorio = new ClienteMemory();
        $clienteUseCase = new ClienteUseCase();
        $return = $clienteUseCase->delete(
            new Uuid(),
            $repositorio
        );

        $this->assertFalse($return);
    }

    public function testAtualizarSaldo()
    {
        $repositorio = new ClienteMemory();
        $clienteUseCase = new ClienteUseCase();
        $cliente = $clienteUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $clienteUseCase->atualizarSaldo($cliente, 100, $repositorio);

        $cliente = $clienteUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertEquals(900, $cliente->getSaldo());
    }
}