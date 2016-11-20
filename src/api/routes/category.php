<?php

$app->group('/category', function (){
    $this->get('', 'CategoryController:index');
    $this->get('/{slug}', 'CategoryController:view');
    $this->post('', 'CategoryController:add');
});