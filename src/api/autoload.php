<?php

spl_autoload_register(function ($classname) {
	$classname = str_replace('\\', '/', $classname);
    require ("controllers/" . $classname . ".php");
});

spl_autoload_register(function ($classname) {
	$classname = str_replace('\\', '/', $classname);
    require("models/". $classname .".php");
});