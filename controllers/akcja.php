<?php

$category = 'Action';
$filmy = $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");

require 'view/akcja.view.php';