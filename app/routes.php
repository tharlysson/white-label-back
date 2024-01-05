<?php

declare(strict_types=1);

use App\Cliente\Presentation\Controllers\ClienteController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $app) {
        $app->options('/{routes:.*}', function (Request $request, Response $response) {
            // CORS Pre-Flight OPTIONS Request Handler
            return $response;
        });

        $app->group('/v1/cliente', function (RouteCollectorProxy $app) {
            $app->post('', [ClienteController::class, 'save']);
            $app->get('', [ClienteController::class, 'findAll']);
        });
    });
};
