<?php

$category = 'Sciencefiction';
$movies = addAndFetch($db, $category);

require 'view/sciencefiction.view.php';