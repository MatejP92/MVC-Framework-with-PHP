<?php
/** User: Matej */

namespace app\core;

/**
 * Class Aplication
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
 */


class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public Controller $controller;
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request  = new Request();
        $this->response = new Response(); 
        $this->router   = new Router($this->request, $this->response);

        $this->db = new Database($config["db"]);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    

    // getter
    /**
     * @return \app\core\Controller
     */
    public function getController(): \app\core\Controller {
        return $this->controller;
    }


    // setter
        /**
     * @param \app\core\Controller $controller
     */
    public function setController(\app\core\Controller $controller): void {
        $this->controller = $controller;
    }

}