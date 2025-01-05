<?php

$title = 'Szczegóły filmu "' . $movie['tytul'] . '" (' . $movie['rok_produkcji'] . ')';

require 'partials/header.view.php';
require 'partials/detailsInclude.view.php';
require 'partials/menu.view.php';
require 'details.view.php';
require 'partials/footer.view.php';