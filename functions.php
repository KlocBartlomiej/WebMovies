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