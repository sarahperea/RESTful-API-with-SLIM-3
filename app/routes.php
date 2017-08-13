<?php

/*creates a new user*/
$app->post('/create', 'HomeController:create');

/*updates a user*/
$app->put('/update/{id}', 'HomeController:update');

/*lists all users*/
$app->get('/users', 'HomeController:retrieve');

/*display user by id*/
$app->get('/users/{id}', 'HomeController:retrieve');

/*deletes a user*/
$app->delete('/delete/{id}', 'HomeController:delete');
