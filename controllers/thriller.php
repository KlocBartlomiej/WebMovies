<?php

$category = 'Thriller';
$filmy = addAndFetch($db, $category);

require 'view/thriller.view.php';