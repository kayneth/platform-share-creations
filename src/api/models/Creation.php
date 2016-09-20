<?php

class Creation
{
     protected $ci;
    //Constructor
    public function __construct(Slim\Container $ci) {
        $this->ci = $ci;
    }

}