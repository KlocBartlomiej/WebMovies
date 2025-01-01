<?php

$category = 'Komedia';

$query = "SELECT * FROM filmy WHERE kategoria = '$category'";
$filmy = $db->executeQuery($query);

require 'view/komedia.view.php';