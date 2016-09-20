<?php

class CreationManager
{
     protected $ci;
     private $db;

    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
        $this->db = $ci
    }

    public function findAll()
    {

    }
}