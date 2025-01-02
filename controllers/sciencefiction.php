<?php

$category = 'Sciencefiction';
$filmy = addAndFetch($db, $category);

require 'view/sciencefiction.view.php';