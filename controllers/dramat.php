<?php

$category = 'Dramat';

$query = "SELECT * FROM filmy WHERE kategoria = '$category'";
$filmy = $db->executeQuery($query);

require 'view/dramat.view.php';