<?php

$category = 'Action';
$filmy = addAndFetch($db, $category);

require 'view/akcja.view.php';