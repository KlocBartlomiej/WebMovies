<?php

$category = 'Thriller';
$movies = addAndFetch($db, $category);

require 'view/thriller.view.php';