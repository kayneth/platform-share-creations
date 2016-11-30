<?php
require_once("Creation.php");

class CreationManager
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
        $q = $this->db->query('SELECT id_creation, title, slug, description, id_category FROM creation');
        while ($donnees = $q->fetch())
        {
            $objs[] = new Creation($donnees);
        }
        return $objs;
    }

    public function findOneBySlug($slug)
    {
        $q = $this->db->prepare('SELECT id_creation, title, slug, description, id_category FROM creation WHERE slug=?');
        $q->execute(array($slug));
        //verifier le type de $q pour renvoyer un NotFoundException !!!
        $obj = new Creation($q->fetch());
        return $obj;
    }

    public function add($creation)
    {
        $q = $this->db->prepare('INSERT INTO creation (id_user, title, slug, file, description, created_at, id_category) VALUES(:idUser, :title, :slug, :file, :description, NOW(), :idCategory)');
        $q->execute(array(
            'idUser' => 1/*$creation->getUser()->getId()*/,
            'title' => $creation->getTitle(),
            'slug' => $creation->getSlug(),
            'file' => 'filename.jpg'/*$creation->getFilename()*/,
            'description' => $creation->getDescription(),
            'idCategory' => 1/*$creation->getCategory()->getId()*/
        ));

        return true;
    }
}