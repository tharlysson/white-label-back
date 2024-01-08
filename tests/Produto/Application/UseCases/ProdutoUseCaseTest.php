<?php

namespace Tests\Produto\Application\UseCases;

use App\Produto\Application\UseCases\ProdutoUseCase;
use App\Produto\Domain\Entities\Produto;
use App\Produto\Infra\Repositories\Memory\ProdutoMemory;
use App\Produto\Presentation\DTO\ProdutoInput;
use App\Shared\ValueObjects\Uuid;
use Codeception\Test\Unit;

class ProdutoUseCaseTest extends Unit
{
    public function testCriarProduto()
    {
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->save(
            new ProdutoInput(
                nome: 'Laticinios',
                descricao: 'Teste',
                valorVarejo: 10.00,
                estoque: 10,
                categoria: null
            ),
            new ProdutoMemory()
        );

        $this->assertTrue(is_string($return));
        $this->assertTrue(preg_match('/[a-f0-9]{8}-([a-f0-9]{4}-){3}[a-f0-9]{12}/', $return) === 1);
    }

    public function testBuscarTodosAsProdutos()
    {
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->findAll(new ProdutoMemory());
        $this->assertTrue(is_array($return));
        $this->assertTrue(count($return) == 3);
        $this->assertInstanceOf(Produto::class, reset($return));
    }

    public function testRetornarPorId()
    {
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new ProdutoMemory()
        );

        $this->assertInstanceOf(Produto::class, $return);
        $this->assertEquals('Coca-Cola', $return->getNome());
    }

    public function testAtualizarProduto()
    {
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->update(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new ProdutoInput(
                nome: 'Teste'
            ),
            new ProdutoMemory()
        );

        $this->assertInstanceOf(Produto::class, $return);
        $this->assertEquals('Teste', $return->getNome());
    }

    public function testAtualizarProdutoInexistente()
    {
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->update(
            new Uuid(),
            new ProdutoInput(
                nome: 'Teste'
            ),
            new ProdutoMemory()
        );

        $this->assertNull($return);
    }

    public function testDeletarProduto()
    {
        $repositorio = new ProdutoMemory();
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->delete(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertTrue($return);

        $return = $produtoUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertNull($return);
    }

    public function testDeletarProdutoInexistente()
    {
        $repositorio = new ProdutoMemory();
        $produtoUseCase = new ProdutoUseCase();
        $return = $produtoUseCase->delete(
            new Uuid(),
            $repositorio
        );

        $this->assertFalse($return);
    }
}