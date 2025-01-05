<?php

$title = 'Szczegóły filmu "' . $movie['tytul'] . '" (' . $movie['rok_produkcji'] . ')';

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
view('details.view.php', [ 'movie' => $movie]);
view('partials/footer.view.php');