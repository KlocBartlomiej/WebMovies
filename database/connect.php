<?php

    $db = require 'Db.php';
    $db->populateTestData();  // Wywoływane tylko dla danych testowych
    return $db;