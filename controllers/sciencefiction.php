<?php

$category = 'Sciencefiction';
$filmy = $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");

require 'view/sciencefiction.view.php';