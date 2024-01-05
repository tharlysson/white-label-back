<?php

declare(strict_types=1);

namespace App\Cliente\Presentation\Controllers;

use App\Cliente\Application\UseCases\ClienteUseCase;
use App\Cliente\Infra\Repositories\Memory\ClienteMemory;
use App\Cliente\Presentation\DTO\ClienteInput;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClienteController
{
    public function save(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $data = $request->getParsedBody();

        $repository = new ClienteMemory();
        $useCase = new ClienteUseCase();

        $return = $useCase->save(
            new ClienteInput(
                nome: $data['nome'],
                email: $data['email'],
                dataNascimento: new \DateTime($data['data_nascimento'])
            ),
            $repository
        );
        $response->getBody()->write((string)json_encode(['cliente_id' => $return]));
        return $response->withStatus(200);
    }

    public function findAll(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $repository = new ClienteMemory();
        $useCase = new ClienteUseCase();
        dd($useCase->findAll($repository));
        $response->getBody()->write('huehue');
        return $response->withStatus(200);
    }
}