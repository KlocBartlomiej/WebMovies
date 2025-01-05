<?php

    $db = require base_path('database/Db.php');
    $db->populateTestData();
    return $db;