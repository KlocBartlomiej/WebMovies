<?php

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
view('partials/addMovieModal.view.php');
view('partials/showMovies.php', [ 'movies' => $movies]);
view('partials/footer.view.php');