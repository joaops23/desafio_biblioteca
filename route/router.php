<?php 

// Instanciando o Slim
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerrequestInterface as Request;
use Slim\Factory\AppFactory;
use Models\User\User;

$app = AppFactory::create();

$app->get('/obras', function(Request $request, Response $response, $args){
    global $capsule;
    $dados = $capsule::table('obras')->where('id', '!=', '0');

    $response->getBody()->write(json_encode($dados));
    return $response;
});

$app->post("/obras", function())

$app->run();