<?php

$category = 'Horror';
$movies = addAndFetch($db, $category);

require 'view/horror.view.php';