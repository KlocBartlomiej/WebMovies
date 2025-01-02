<?php

$category = 'Komedia';
$filmy = addAndFetch($db, $category);

require 'view/komedia.view.php';