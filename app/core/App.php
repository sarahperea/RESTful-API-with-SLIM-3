<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
/*require '../rb.php';

R::setup( 'mysql:host=localhost;dbname=db_indigo','root', 'luckystar' );
*/

$config['db'] = 'mysql';
$config['host'] = 'localhost';
$config['dbname'] = 'db_indigo';
$config['user'] = 'root';
$config['pw'] = 'luckystart';

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







