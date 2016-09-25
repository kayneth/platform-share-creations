<?php
require_once("models/Creation.php");

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
            $q = $this->db->query('SELECT id_creation, title, slug FROM creation');
            while ($donnees = $q->fetch())
            {
                $objs[] = new Creation($donnees);
            }
            return $objs;
    }
    
    public function findOneBySlug($slug)
    {
        $q = $this->db->prepare('SELECT id_creation, title, slug FROM creation WHERE slug=?');
        $q->execute(array($slug));
        $obj = new Creation($q->fetch());
        return $obj;
    }
}