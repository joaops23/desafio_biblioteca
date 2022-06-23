<?php 
namespace Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Controller implements MiddlewareInterface
{
    public function process(Request $request, RequestHandler $handler): Response 
    {
        $ContentType = $request->getHeaderLine('Content-Type');

        if(strstr($ContentType, 'Application/json')) {
            $contents = json_decode(file_get_contents('php://input'), true);
            if(json_last_error() === JSON_ERROR_NONE){
                $request = $request->withParsedBody($contents);
            }
        }

        return $handler->handle($request);
    }
}

?>
