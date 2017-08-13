<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../rb.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['host'] = 'localhost';
$config['dbname'] = 'db_indigo';
$config['user'] = 'root';
$config['pw'] = 'luckystar';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container["RedBeanFactory"] = function ($c) {
  return new App\core\RedBeanFactory($c['settings']);
};

$container[HomeController::class] = function ($c) { 
	return new App\controllers\HomeController($c->get("RedBeanFactory"));
};

require '../app/routes.php';

$app->run();






