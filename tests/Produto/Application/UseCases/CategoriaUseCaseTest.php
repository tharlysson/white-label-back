<?php

namespace Tests\Produto\Application\UseCases;

use App\Produto\Application\UseCases\CategoriaUseCase;
use App\Produto\Domain\Entities\Categoria;
use App\Produto\Infra\Repositories\Memory\CategoriaMemory;
use App\Produto\Presentation\DTO\CategoriaInput;
use App\Shared\ValueObjects\Uuid;
use Codeception\Test\Unit;

class CategoriaUseCaseTest extends Unit
{
    public function testCriarCategoria()
    {
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->save(
            new CategoriaInput(
                nome: 'Laticinios'
            ),
            new CategoriaMemory()
        );

        $this->assertTrue(is_string($return));
        $this->assertTrue(preg_match('/[a-f0-9]{8}-([a-f0-9]{4}-){3}[a-f0-9]{12}/', $return) === 1);
    }

    public function testBuscarTodosAsCategorias()
    {
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->findAll(new CategoriaMemory());
        $this->assertTrue(is_array($return));
        $this->assertTrue(count($return) == 3);
        $this->assertInstanceOf(Categoria::class, reset($return));
    }

    public function testRetornarPorId()
    {
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new CategoriaMemory()
        );

        $this->assertInstanceOf(Categoria::class, $return);
        $this->assertEquals('Bebidas', $return->getNome());
    }

    public function testAtualizarCategoria()
    {
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->update(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            new CategoriaInput(
                nome: 'Teste'
            ),
            new CategoriaMemory()
        );

        $this->assertInstanceOf(Categoria::class, $return);
        $this->assertEquals('Teste', $return->getNome());
    }

    public function testAtualizarCategoriaInexistente()
    {
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->update(
            new Uuid(),
            new CategoriaInput(
                nome: 'Teste'
            ),
            new CategoriaMemory()
        );

        $this->assertNull($return);
    }

    public function testDeletarCategoria()
    {
        $repositorio = new CategoriaMemory();
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->delete(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertTrue($return);

        $return = $categoriaUseCase->findById(
            new Uuid('bde3aca1-8151-40fb-891f-99cce03d79ff'),
            $repositorio
        );

        $this->assertNull($return);
    }

    public function testDeletarCategoriaInexistente()
    {
        $repositorio = new CategoriaMemory();
        $categoriaUseCase = new CategoriaUseCase();
        $return = $categoriaUseCase->delete(
            new Uuid(),
            $repositorio
        );

        $this->assertFalse($return);
    }
}