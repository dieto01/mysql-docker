<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request; // Corrigido

use Slim\Factory\AppFactory;


use Slim\Views\PhpRenderer; // Corrigido

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/',
 function(Request $request, Response $response, $args) {
    $response->getBody()->write("ola mundo!!!");
    return $response;
 }
);

$app->get('/mensagem/{nome}',
 function(Request $request, Response $response, $args) { 
    $response->getBody()->write("boa noite ");
    return $response;
 });

$app->get('/hello',
 function(Request $request, Response $response, $args) { 
    $renderer = new PhpRenderer(__DIR__ . '/templates');
    return $renderer->render($response, 'hello.php', [mensagem]);
 });


$app->run();













