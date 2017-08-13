<?php

/*creates a new user*/
$app->post('/create', 'HomeController:create');

/*updates a user*/
$app->put('/update/{id}', 'HomeController:update');

/*lists all users*/
$app->get('/users', 'HomeController:retrieveAll');

/*display user by id*/
$app->get('/users/{id}', 'HomeController:retrieve');

/*deletes a user*/
$app->delete('/delete/{id}', 'HomeController:delete');

/*add pet to user*/
$app->put('/users/{id}/addpet', 'HomeController:addPet');

/*retrieve pets of user*/
$app->get('/users/{id}/retrievepets', 'HomeController:retrievePets');

