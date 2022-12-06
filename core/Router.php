<?php
/** User: Matej */

namespace app\core;

/**
 * Class Router
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
 */


class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router constructor
     * 
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     */
    
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)   // this function accepts 2 parameters, if the path is $path, the $callback must be executed
    { 
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback)   // this function accepts 2 parameters, if the path is $path, the $callback must be executed
    { 
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false; 
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace("{{content}}", $viewContent, $layoutContent);
        // include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    public function renderContent($viewContent){
        $layoutContent = $this->layoutContent();
        return str_replace("{{content}}", $viewContent, $layoutContent);
        // include_once Application::$ROOT_DIR . "/views/$view.php";
    }


    protected function layoutContent(){
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params){
        foreach($params as $key => $value){
            $$key = $value;     // $$key means if $key evaluates as name, $$key will be evaluated as name variable, and the name variable equals $value
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}