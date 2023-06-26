<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// basic routing system

//if($uri === '/'){
//    require "controllers/index.php";
//}elseif ($uri === '/about'){
//    require "controllers/about.php";
//}elseif ($uri === '/contact'){
//    require "controllers/contact.php";
//}else{
//    require "index.php";
//}

$route = [
    '/' => "controllers/index.php",
    '/about' => "controllers/about.php",
    '/contact' => "controllers/contact.php"
];

function error($code){
    http_response_code($code);
    require "views/{$code}.view.php";
    die();
}



function routeToController($uri,$route){
    if(array_key_exists($uri,$route)){
        require  "$route[$uri]";
    }else{
        error(404);
    }
}

routeToController($uri,$route);

