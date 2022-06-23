<?php 

// Instanciando o Slim
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Models\User\User;
use Models\User\Database;
use Illuminate\Support\Facades\DB;
use Controllers\Controller;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = AppFactory::create();

// Adicionando Handler de requisições
$app->add(function (Request $request, RequestHandler $handler){
    return $handler->handle($request);
});

$app->get('/obras', function(Request $request, Response $response, $args){
    global $capsule;
    $dados = $capsule::table('obras')->get();
    $resposta = json_encode($dados);
    
    $response->getBody()->write($resposta);
    return $response
            ->withStatus(201);
});

$app->post("/obras", function(Request $request, Response $response, $args){
    if($request->getHeaderLine('Content-Type') == 'application/xml'){
        $body = $request->getBody()->getContents();
        $body = simplexml_load_string($body);
        $data = json_encode($body);
        $data = json_decode($data, true);
    }
    else{
        $body = $request->getBody()->getContents();
        $data = json_decode($body, true);
    }

    $autores = "";
    foreach($data['autores'] as $autor){
        $autores .= $autor . "|";
    }

    $data['autores'] = $autores;
    User::gravar($data);
    $response->getBody()->write("incluído com sucesso!");
    return $response
            ->withStatus(201);
});

$app->put('/obras/{id}', function(Request $request, Response $response, $args){
    global $capsule;
    # Atualizar titulo, editora, foto e autores da obra
    $id = $args['id'];
    $req = $request->getBody()->getContents();
    $head = $request->getHeaderLine("Content-Type");
    $body = "";

    if($head == 'application/xml'){
        $rtrn = simplexml_load_string($req);
        $data = json_encode($body);
        $data = json_decode($data, true);
    }
    else{
        $body = $request->getBody()->getContents();
        $data = json_decode($body, true);
    }
    $autores = "";
    if(isset($data['autores'])){
        foreach($data['autores'] as $autor){
            $autores .= $autor . "|";
        }
        $data['autores'] = $autores;
    }    
    $numr = $capsule::table('obras')->where("id", "=", trim($id))->count();
    $dados_default = $capsule::select('SELECT * FROM obras WHERE id = ?', [$id]);

    $titulo = isset($data['titulo']) ? $data['titulo'] : $dados_default[0]['titulo'];
    $editora = isset($data['editora']) ? $data['editora'] : $dados_default[0]['editora'];
    $foto = isset($data['foto']) ? $data['foto'] : $dados_default[0]['foto'];
    $autores = isset($data['autores']) ? $data['autores'] : $dados_default[0]['autores'];

    if($numr != 0) {
        $capsule::table('obras')->where('id', $id)->update( array('titulo'=> $titulo, 'editora'=> $editora, 'foto' => $foto, 'autores' => $autores));
        $message = "Alterado com sucesso!";
    } else {
        $message = "Erro, id não encontrado!";
    }
    $response->getBody()->write($message);
    return $response
            ->withStatus(201);
});

$app->delete('/obras/{id}', function(Request $request, Response $response, $args){
    global $capsule; 
    $id = $args['id'];

    $numr = $capsule::table("obras")->where("id", $id)->count();

    if($numr != 0){
        $capsule::table("obras")->where("id", $id)->delete();
        $message = "Obra deletada!";
    } else{ 
        $message = "erro, id não encontrado!";
    }

    $response->getBody()->write($message);
    return $response;
});

$app->run();