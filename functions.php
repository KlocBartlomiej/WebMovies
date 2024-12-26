<?php

function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function uriIs($uri){
    return $_SERVER['REQUEST_URI']===$uri;
}

function abort($code = 404){
    http_response_code($code);
        require "view/{$code}.php";
        die();
}