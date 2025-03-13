<?php

addMovieIfRequired($db);

if (isset($_POST['deleteComment'])) {
    $db->deleteComment($_POST['comment_id']);
}

$movie = getMovie($db, $id);

if (!$movie) {
    abort();
}

$comments = addAndFetchComments($db, $movie['id']);

view('movieDetails.view.php', [ 'movie' => $movie, 'comments' => $comments]);