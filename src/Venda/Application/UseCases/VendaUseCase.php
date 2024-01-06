<?php

declare(strict_types=1);

namespace App\Venda\Application\UseCases;

use App\Cliente\Application\UseCases\ClienteUseCase;
use App\Cliente\Domain\Repositories\ClienteRepository;
use App\Produto\Application\UseCases\ProdutoUseCase;
use App\Produto\Domain\Repositories\ProdutoRepository;
use App\Shared\Exceptions\DomainException;
use App\Shared\ValueObjects\Uuid;
use App\Venda\Domain\Entities\Venda;
use App\Venda\Domain\Repositories\VendaRepository;
use App\Venda\Presentation\DTO\VendaProdutoInput;

class VendaUseCase
{
    /**
     * @param Uuid $clienteId
     * @param VendaProdutoInput[] $produtos
     * @param VendaRepository $vendaRepository
     * @param ClienteRepository $clienteRepository
     * @param ProdutoRepository $produtoRepository
     *
     * @throws DomainException
     */
    public function realizarVenda(
        Uuid $clienteId,
        array $produtos,
        VendaRepository $vendaRepository,
        ClienteRepository $clienteRepository,
        ProdutoRepository $produtoRepository
    ): void {
        $total = 0;
        $produtosVenda = [];
        $cliente = $clienteRepository->findById($clienteId);

        foreach ($produtos as $produto) {
            $produtoBase = $produtoRepository->findById($produto->produtoId);

            if ($produtoBase === null) {
                continue;
            }

            $produtosUseCase = new ProdutoUseCase();

            if ($produtosUseCase->baixarEstoque($produtoBase->getId(), $produto->quantidade, $produtoRepository)) {
                $produtosVenda[] = $produtoBase;
                $total += $produtoBase->getValorVarejo() * $produto->quantidade;
            }
        }

        $clienteUseCase = new ClienteUseCase();
        $clienteUseCase->atualizarSaldo($cliente, $total, $clienteRepository);

        $vendaRepository->save(
            new Venda(
                $produtosVenda,
                $total,
                $cliente
            )
        );
    }
}