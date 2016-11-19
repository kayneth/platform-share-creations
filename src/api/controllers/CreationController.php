<?php
//namespace Api\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/models/CreationManager.php';

class CreationController
{
    protected $ci;
    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
    }

    public function index(Request $request, Response $response, $args)
    {
        $creationManager = new CreationManager($this->ci);
        $creations = $creationManager->findAll();

        return $response->withJson($creations);
    }

    public function view(Request $request, Response $response, $args)
    {
        $slug = $request->getAttribute('slug');
        $creationManager = new CreationManager($this->ci);
        $creation = $creationManager->findOneBySlug($slug);

        return $response->withJson($creation);
    }

    public function add(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $creation = new Creation($data);
        $creationManager = new CreationManager($this->ci);
        $creation = $creationManager->add($creation);
        return $response->withJson($creation);
    }
}