<?php
/** User: Matej */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class SiteController
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\controllers
 */

class SiteController extends Controller {

    public function home(){
        $params = [
            "name" => "Matej"
        ];
        return $this->render("home", $params);
    }

    public function contact(){
        return $this->render("contact");
    }

    public function handleContact(Request $request){
        $body = $request->getBody();
        echo "<pre>";
        var_dump($body);
        echo "</pre>";
        exit;
        return "Handling submitted data";
    }
}