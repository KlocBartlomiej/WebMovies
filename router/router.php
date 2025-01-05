<?php

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $uriExp = explode("/",$uri);

    $routes = require 'routes.php';

    if (array_key_exists($uri,$routes)) {
        require $routes[$uri];
    } else if (array_key_exists($uriExp[1],$routes)) {
        $id = $uriExp[2];
        require $routes[$uriExp[1]];
    } else {
        abort();
    }