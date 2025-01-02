<?php

$category = 'Komedia';
$filmy = $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");

require 'view/komedia.view.php';