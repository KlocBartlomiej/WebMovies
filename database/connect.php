<?php

    $db = require 'Db.php';
    $db->populateTestData();
    return $db;