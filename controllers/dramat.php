<?php

$category = 'Dramat';
$filmy = addAndFetch($db, $category);

require 'view/dramat.view.php';
