<?php
require_once("Category.php");

class CategoryManager
{
    protected $ci;
    private $db;

    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
        $this->db = $ci->get('db');
    }

    public function findAll()
    {
        $objs = array();
        //
        $q = $this->db->query('SELECT id_category, title, slug FROM category');
        while ($donnees = $q->fetch())
        {
            $objs[] = new Category($donnees);
        }
        return $objs;
    }

    public function findOneBySlug($slug)
    {
        $q = $this->db->prepare('SELECT id_category, title, slug FROM category WHERE slug=?');
        $q->execute(array($slug));
        //verifier le type de $q pour renvoyer un NotFoundException !!!
        $obj = new Category($q->fetch());
        return $obj;
    }

    public function add($category)
    {
        $q = $this->db->prepare('INSERT INTO category (id_category, title, slug) VALUES(:idCategory, :title, :slug)');
        $q->execute(array(
            'idCategory' => $category->getId(),
            'title' => $category->getTitle(),
            'slug' => $category->getSlug()
        ));

        return true;
    }
}