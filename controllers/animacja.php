<?php

$category = 'Animacja';
$movies = addAndFetch($db, $category);

require 'view/animacja.view.php';