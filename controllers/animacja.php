<?php

$category = 'Animacja';

$query = "SELECT * FROM filmy WHERE kategoria = '$category'";
$filmy = $db->executeQuery($query);

require 'view/animacja.view.php';