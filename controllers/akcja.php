<?php

$category = 'Action';
$movies = addAndFetch($db, $category);

require 'view/akcja.view.php';