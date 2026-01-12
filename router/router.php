<?php

if (isset($_POST['log-in']) && !isLoginAttemptSuccessfull($db, $_POST['login'], $_POST['password'])) {
    view('login.view.php');
} else if (!isset($_SESSION['isAdmin'])) {
    view('login.view.php');
} else {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $uriExp = explode("/", $uri);

    $routes = require base_path('router/routes.php');

    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}