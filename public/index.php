<?php

/** User: Matej Pal */
/** Started: 28.11.2022 */
/** Ended: */
/** Done with the help of YouTube, freeCodeCamp.org tutorial*/
/** Link: https://www.youtube.com/watch?v=6ERdu4k62wI&t=627s&ab_channel=freeCodeCamp.org */



// Firts we start the php server with command in console php -S localhost:8080
// we now see all the requests (get, post) in the console 
// all the requests are set in index.php

use app\controllers\AuthController;
use app\controllers\SiteController;
use matejpal\phpmvc\Application;       // with this we use app core Application in this file, so we dont have to write the path to it when defining new classes


require_once __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$config = [
    "userClass" => \app\models\User::class,
    "db" => [
        "dsn" => $_ENV["DB_DSN"],
        "user" => $_ENV["DB_USER"],
        "password" => $_ENV["DB_PASSWORD"]
    ]
];

$app = new Application(dirname(__DIR__), $config);       // if we didnt have the use matejpal\phpmvc\application above, we would always need to write new matejpal\phpmvc\Application() if we want to create a new instance of the Application


// 2 classes need to be created, application and router
// core folder will contain all the classes of this course
// later the core folder will be instalable with the composer, so the core can be updated if someone instaled this on their computer

// $app->router->get("/", function(){  // if the get request is used on / then execute the following function
//     return "Hello World";
// });


$app->router->get("/", [SiteController::class ,"home"]);
$app->router->get("/contact", [SiteController::class, "contact"]);
$app->router->post("/contact", [SiteController::class, "contact"]);

$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->get("/logout", [AuthController::class, "logout"]);
$app->router->get("/profile", [AuthController::class, "profile"]);



$app->run();