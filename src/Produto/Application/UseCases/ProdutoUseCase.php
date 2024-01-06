<?php

declare(strict_types=1);

namespace App\Produto\Application\UseCases;

use App\Produto\Domain\Entities\Produto;
use App\Produto\Domain\Repositories\ProdutoRepository;
use App\Produto\Presentation\DTO\ProdutoInput;
use App\Shared\Exceptions\DomainException;
use App\Shared\ValueObjects\Uuid;

class ProdutoUseCase
{
    public function save(ProdutoInput $produto, ProdutoRepository $repository): string
    {
        $produtoObj = new Produto(
            nome: $produto->nome,
            descricao: $produto->descricao,
            valorVarejo: $produto->valorVarejo,
            estoque: $produto->estoque,
            categoria: $produto->categoria
        );

        $repository->save(
            $produtoObj
        );

        return $produtoObj->getId()->value;
    }

    public function findAll(ProdutoRepository $repository): array
    {
        return $repository->findAll();
    }

    public function findById(Uuid $id, ProdutoRepository $repository): ?Produto
    {
        return $repository->findById($id);
    }

    /**
     * @throws DomainException
     */
    public function update(Uuid $id, ProdutoInput $produto, ProdutoRepository $repository): ?Produto
    {
        $produtoRepo = $repository->findById($id);

        if (!$produtoRepo) {
            return null;
        }

        $produtoRepo->setNome($produto->nome);
        $produtoRepo->setDescricao($produto->descricao);
        $produtoRepo->setValorVarejo($produto->valorVarejo);
        $produtoRepo->setEstoque($produto->estoque);
        $produtoRepo->setCategoria($produto->categoria);

        $repository->update($produtoRepo);

        return $produtoRepo;
    }

    public function delete(Uuid $id, ProdutoRepository $repository): bool
    {
        return $repository->delete($id);
    }

    /**
     * @throws DomainException
     */
    public function baixarEstoque(Uuid $id, float $quantidade, ProdutoRepository $repository): bool
    {
        $produto = $this->findById($id, $repository);

        if ($produto === null || $produto->getEstoque() < $quantidade) {
            return false;
        }

        $produto->setEstoque($produto->getEstoque() - $quantidade);
        $repository->update($produto);

        return true;
    }
}