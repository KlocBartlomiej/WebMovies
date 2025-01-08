<?php

if (isset($_POST['log-in']) && !isLoginAttemptSuccessfull($db, $_POST['login'],$_POST['password'], $_POST['nick'])) {
    view('login.view.php');
} else if (!isset($_SESSION['logged-in'])) {
    view('login.view.php');
} else {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $uriExp = explode("/",$uri);

    $routes = require base_path('router/routes.php');

    if (array_key_exists($uri,$routes)) {
        require base_path($routes[$uri]);
    } else if (array_key_exists('/' . $uriExp[1],$routes)) {
        $id = $uriExp[2];
        require base_path($routes['/' . $uriExp[1]]);
    } else {
        abort();
    }
}