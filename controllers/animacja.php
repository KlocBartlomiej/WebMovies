<?php

$category = 'Animacja';
$filmy = $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = '" . $category . "';");

require 'view/animacja.view.php';