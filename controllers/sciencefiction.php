<?php

$category = 'Sciencefiction';

$query = "SELECT * FROM filmy WHERE kategoria = '$category'";
$filmy = $db->executeQuery($query);

require 'view/sciencefiction.view.php';