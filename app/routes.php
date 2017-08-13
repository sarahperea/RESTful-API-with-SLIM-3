<?php

/*creates a new user*/
$app->post('/create', 'UserController:create');

/*updates a user*/
$app->put('/update/{id}', 'UserController:update');

/*lists all users*/
$app->get('/users', 'UserController:retrieveAll');

/*display user by id*/
$app->get('/users/{id}', 'UserController:retrieve');

/*deletes a user*/
$app->delete('/delete/{id}', 'UserController:delete');

/*add pet to user*/
$app->put('/users/{id}/addpet', 'UserController:addPet');

/*retrieve pets of user*/
$app->get('/users/{id}/retrievepets', 'UserController:retrievePets');

