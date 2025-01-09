<?php

$movie = getMovie($db, $id);

if (!$movie) {
    abort();
}

$comments = addAndFetchComments($db, $movie['id']);

view('movieDetails.view.php', [ 'movie' => $movie, 'comments' => $comments]);