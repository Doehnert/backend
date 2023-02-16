<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

ini_set('max_execution_time', 0);

require __DIR__ . '/../vendor/autoload.php';
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/Infrastructure/dependencies.php');
$container = $containerBuilder->build();

$app = \DI\Bridge\Slim\Bridge::create($container);

$app->add(new Tuupola\Middleware\CorsMiddleware([
  "logger" => $logger,
  "origin" => ["*"],
  "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE"],
  "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since"],
  "headers.expose" => [],
  "credentials" => true,
  "cache" => 0
]));

$beforeMiddleware = function (Request $request, RequestHandler $handler) {
  if ($request->getMethod() !== 'OPTIONS') {
    $response = $handler->handle($request);
    $response->getBody();
    return $response
      ->withHeader('Access-Control-Allow-Origin', '*')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    // ->withStatus(200);
  } else {
    $response = new Response();
    $response = $response->withHeader('Access-Control-Allow-Headers', '*');

    return $response
      ->withHeader('Access-Control-Allow-Origin', '*')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
  }
};

$app->add($beforeMiddleware);
require __DIR__ . '/Api/routes.php';

$app->run();