<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();

$container[Model_User::class] = function ($c) { 
	return new App\models\Model_User;
};

$container[HomeController::class] = function ($c) { 
	return new App\controllers\HomeController;
};

require '../app/routes.php';



$app->run();

R::close();







