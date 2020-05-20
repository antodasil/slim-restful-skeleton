<?php

namespace Controllers;

use SlimRestful\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Controller example
 */
class HelloController extends BaseController {

    /**
     * GET method example
     * @test
     */
    public function get(Request $request, Response $response, array $args): Response {

        $response->getBody()->write('<h1>Hello world!</h1>');
        return $response->withStatus(self::GET_SUCCESS_STATUS);
    }

    /**
     * POST method example
     */
    public function post(Request $request, Response $response, array $args): Response {

        $response->getBody()->write(
            json_encode(
                array(
                    'Hello' => 'world'
                )
            )
        );

        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(self::POST_SUCCESS_STATUS);
    }
}