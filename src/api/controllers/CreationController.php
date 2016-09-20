<?php
//namespace Api\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class CreationController
{
    protected $ci;
    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
    }

    public function view(Request $request, Response $response, $args)
    {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello, $name");

        return $response;
    }
}