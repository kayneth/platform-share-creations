<?php

spl_autoload_register(function ($classname) {
	$classname = str_replace('\\', '/', $classname);

    $ctrlFileName = "controllers/" . $classname . ".php";

    if (file_exists($ctrlFileName))
    {
        require_once("controllers/" . $classname . ".php");
    }else{
        require_once("models/". $classname .".php");
    }
});