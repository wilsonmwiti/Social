<?php

namespace Core\Managers;

use Core\Route;
use Core\Tools;
use Core\Http\Request;
use Core\Http\Response;
use Exception\HttpException;
use Exception\ExceptionHandler;

class RoutingManager
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';

    private $routes = array();
    
    private $templateEngine;

    public function __construct($templateEngine){
        $this->templateEngine = $templateEngine;
        $exceptionHandler = new ExceptionHandler($templateEngine);
        set_exception_handler(array($exceptionHandler, 'handle'));
        //set_error_handler(array($exceptionHandler, 'handleError'));
    }

    public function get($pattern, $callable){
        $this->registerRoute(Request::GET, $pattern, $callable);

        return $this;
    }

    public function post($pattern, $callable){
        $this->registerRoute(Request::POST, $pattern, $callable);

        return $this;
    }

    public function put($pattern, $callable){
        $this->registerRoute(Request::PUT, $pattern, $callable);

        return $this;
    }

    public function delete($pattern, $callable){
        $this->registerRoute(Request::DELETE, $pattern, $callable);

        return $this;
    }

    public function run(Request $request = NULL){
        if (NULL === $request){
            $request = Request::createFromGlobals();
        }

        $method = $request->getMethod();
        $uri    = $request->getUri();

        foreach ($this->routes as $route){
            if ($route->match($method, $uri)){
                return $this->process($request, $route);
            }
        }

        throw new HttpException(404, "Page non trouvée!");
    }

    private function process(Request $request, Route $route){
        try{
            $arguments = $route->getArguments();
            array_unshift($arguments, $request);

            $response = call_user_func_array($route->getCallable(), $arguments);

            if (!$response instanceof Response)
            {
                $response = new Response($response);
            }

            $response->send();
        }
        catch (\Exception $e){
            throw new HttpException(500, $e->getMessage(), $e);
        }
    }

    public function redirect($to, $statusCode = 302){
        // \http_response_code($statusCode); <-- Fonction dispo dans PHP > 5.4.0
        Tools::http_response_code($statusCode);

        header(sprintf('Location: %s', $to));

        die;
    }

    private function registerRoute($method, $pattern, $callable){
        $this->routes[] = new Route($method, $pattern, $callable);
    }
}