<?php

namespace Routes;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use SlimRestful\BaseMiddleware;

class ExampleMiddleware extends BaseMiddleware {

    /** 
     * @param Request $request
     * @param RequestHandler $handler
     * 
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response {

        //Add instructions before controller here
        $before = '<p style="color:blue;">Successfully passed in ExampleMiddleware <span style="text-decoration:underline">BEFORE</span> route</p>';

        return $this->doAfter($request, $handler, $before, function() {
            //Add instructions after controller here
            return '<p style="color:red;">Successfully passed in ExampleMiddleware <span style="text-decoration:underline">AFTER</span> route</p>';
        });

    }
}