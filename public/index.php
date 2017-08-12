<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../app/init.php';
$app = new App;

/*
require '../vendor/autoload.php';
require '../app/dbconnect.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);
$container = $app->getContainer();

$container[Model_User::class] = function ($c) { 
	return new App\Models\Model_User;
};

require '../app/routes.php';
$app->run();

R::close();
*/

?>

