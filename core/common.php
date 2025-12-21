<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function uriIs($uri)
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('view/' . $path);
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("view/errors/{$code}.php");
    die();
}

function isLoginAttemptSuccessfull($db, $login, $password, $nick)
{
    $user = $db->executeSelectQuery("SELECT * FROM uzytkownicy WHERE login = ? AND haslo = ?;", [$login, $password]);

    if (count($user) === 0 || !$user) {
        return false;
    }

    $user = $user[0];
    $_SESSION['isAdmin'] = $user['id'] === 1;
    $_SESSION['nick'] = $nick;
    return true;
}
