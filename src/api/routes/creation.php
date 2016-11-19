<?php

$app->get('/hello/{name}', 'UserController:view');

$app->group('/creation', function (){
    $this->get('', 'CreationController:index');
    $this->get('/{slug}', 'CreationController:view');
    $this->post('', 'CreationController:add');
});