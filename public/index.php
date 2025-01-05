<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

$db = require base_path('database/connect.php');
require base_path('router/router.php');