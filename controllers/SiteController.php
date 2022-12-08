<?php
/** User: Matej */

namespace app\controllers;

use matejpal\phpmvc\Application;
use matejpal\phpmvc\Controller;
use matejpal\phpmvc\Request;
use matejpal\phpmvc\Response;
use app\models\ContactForm;

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

    public function contact(Request $request, Response $response){
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash("success", "Thanks for contacting");
                return $response->redirect("/contact");
            }
        }
        return $this->render("contact", [
            "model" => $contact
        ]);
    }


}