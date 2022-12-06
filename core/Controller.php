<?php
/** User: Matej */

namespace app\core;

/**
 * Class Controller
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
*/

class Controller{

    public string $layout = "main";
    public function setLayout($layout){
        $this->layout = $layout;
    }

    public function render($view, $params = []){
        return Application::$app->router->renderView($view, $params);
    }
}