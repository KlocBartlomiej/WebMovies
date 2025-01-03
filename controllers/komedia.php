<?php

$category = 'Komedia';
$movies = addAndFetch($db, $category);

require 'view/komedia.view.php';