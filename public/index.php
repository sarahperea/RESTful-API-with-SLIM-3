<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

require '../rb.php';

R::setup('mysql:host=localhost;dbname=db_indigo','root','luckystar');


$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();

$container[HomeController::class] = function ($c) { 
    return new App\Controllers\HomeController;
};

$app->get('/', 'HomeController:index');

//displays all records of users
$app->get('/api/users', function($request, $response) {

	$data = R::getAll( "SELECT * FROM user ORDER BY user_id" );

	if (isset($data)) {
		return $response->withJson($data);
	}
});

//displays a single user
$app->get('/api/users/{id}', function($request, $response){

	$id = $request->getAttribute('id');

	$data = R::getRow( "SELECT * FROM user WHERE user_id=$id" );

	return $response->withJson($data);
});

//creates a new record of a user
$app->post('/api/users', function($request, $response){

	$parsedBody = $request->getParsedBody();

	R::exec( "INSERT INTO user (first_name, middle_name, last_name) VALUES (:fn,:mn,:ln)",
		array(':fn' => $parsedBody['first_name'], ':mn' => $parsedBody['middle_name'], ':ln' => $parsedBody['last_name']) );

});

//updates a record of a user
$app->put('/api/users/{id}', function($request, $response) {

	$id = $request->getAttribute('id');
	$parsedBody = $request->getParsedBody();

	R::exec( "UPDATE user SET first_name = :fn, middle_name = :mn, last_name = :ln WHERE user.user_id = :id",
		array(':id' => $id, ':fn' => $parsedBody['first_name'], ':mn' => $parsedBody['middle_name'], ':ln' => $parsedBody['last_name']) );

});

//deletes a record from the database
$app->delete('/api/users/{id}', function($request, $response) {

	$id = $request->getAttribute('id');

	R::exec( "DELETE FROM user WHERE user.user_id = :id", array(':id' => $id) );

});

$app->run();

R::close();

?>

