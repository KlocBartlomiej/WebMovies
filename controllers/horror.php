<?php

$category = 'Horror';
$filmy = addAndFetch($db, $category);

require 'view/horror.view.php';