<?php

$category = 'Thriller';
$filmy = $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");

require 'view/thriller.view.php';