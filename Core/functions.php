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

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    require base_path('view/' . $path);
}

function abort($code = 404){
    http_response_code($code);
    require base_path("view/{$code}.php");
    die();
}

function getMovie($db, $id) {
    return $db->executeSelectQuery("SELECT * FROM filmy WHERE id = '" . $id . "';")[0];
}

function addAndFetch($db, $category) {
    if (isset($_POST['addMovie'])) {
        $db->addMovie($_POST, $category);
    }
    
    return $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");
}

function isLoginAttemptSuccessfull($db, $login, $password) {
    $user = $db->executeSelectQuery("SELECT * FROM uzytkownicy WHERE login = '" . $login . "' AND haslo = '" . $password . "';")[0];

    if(!$user) {
        return false;
    }

    $_SESSION['logged-in'] = $user['id'];
    return true;
}