<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../rb.php';
$config['db'] = R::setup( 'mysql:host=localhost;dbname=db_indigo','root', 'luckystar' );

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	]
]);

$container = $app->getContainer();

$container["RedBeanFactory"] = function () {
  return new App\core\RedBeanFactory($config);
};

$container[HomeController::class] = function ($c) { 
	return new App\controllers\HomeController($c->get("RedBeanFactory"));
};

require '../app/routes.php';



$app->run();

R::close();







