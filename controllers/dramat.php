<?php

$category = 'Dramat';
$movies = addAndFetch($db, $category);

require 'view/dramat.view.php';
