<?php

$movie = getMovie($db, $id);

if (!$movie) {
    abort();
}

$comments = getComments($db, $movie['id']);

view('movieDetails.view.php', [ 'movie' => $movie, 'comments' => $comments]);