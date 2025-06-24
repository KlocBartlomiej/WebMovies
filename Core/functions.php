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
    return $db->executeSelectQuery("SELECT * FROM filmy WHERE id = ?;", [$id])[0];
}

function fetchMovies($db, $category) {
    return $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = ?;", [$category]);
}

function addMovieIfRequired($db) {
    if (isset($_POST['addMovie'])) {
        $target_image_dir = base_path("img/covers/");
        
        // Ensure the directory exists
        if (!is_dir($target_image_dir)) {
            mkdir($target_image_dir, 0777, true);
        }

        $target_cover_file = $target_image_dir . basename($_FILES["sciezka_do_okladki"]["name"]);
        if (!move_uploaded_file($_FILES["sciezka_do_okladki"]["tmp_name"], $target_cover_file)) {
            abort(400); // Błąd przesyłania pliku
        }

        // Debugging
        if (!file_exists($target_cover_file)) {
            dd("File not uploaded: " . $target_cover_file);
        }

        $db->addMovie($target_cover_file);
    }
}

function addAndFetchComments($db, $id_filmu) {
    if (isset($_POST['addComment'])) {
        $db->addComment($_POST);
    }

    return $db->executeSelectQuery("SELECT * FROM komentarze WHERE id_filmu = ?;", [$id_filmu]);
}

function isLoginAttemptSuccessfull($db, $login, $password, $nick) {
    $user = $db->executeSelectQuery("SELECT * FROM uzytkownicy WHERE login = ? AND haslo = ?;", [$login, $password])[0];

    if(!$user) {
        return false;
    }

    $_SESSION['logged-in'] = $user['id'];
    $_SESSION['nick'] = $nick;
    return true;
}
