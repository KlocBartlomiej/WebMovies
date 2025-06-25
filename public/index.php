<?php

session_start();

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'core/common.php';

$db = require base_path('database/connect.php');
require base_path('core/movieFunctions.php');
require base_path('router/router.php');