<?php
//namespace Api\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/models/CategoryManager.php';

class CategoryController
{
    protected $ci;
    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
    }

    public function index(Request $request, Response $response, $args)
    {
        $categoryManager = new CategoryManager($this->ci);
        $categories = $categoryManager->findAll();

        return $response->withJson($categories);
    }

    public function view(Request $request, Response $response, $args)
    {
        $slug = $request->getAttribute('slug');
        $categoryManager = new CategoryManager($this->ci);
        $category = $categoryManager->findOneBySlug($slug);

        return $response->withJson($category);
    }

    public function add(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $category = new Category($data);
        $categoryManager = new CategoryManager($this->ci);
        $category = $categoryManager->add($category);
        return $response->withJson($category);
    }
}