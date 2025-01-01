<?php

$category = 'Horror';

$query = "SELECT * FROM filmy WHERE kategoria = '$category'";
$filmy = $db->executeQuery($query);

require 'view/horror.view.php';