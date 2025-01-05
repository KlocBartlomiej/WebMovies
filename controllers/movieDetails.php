<?php

$movie = getMovie($db, $id);

if (!$movie) {
    abort();
}

//TODO należy także zwrócić wszystkie komentarze, jakie do tej pory zostały dodane do filmu

view('movieDetails.view.php', [ 'movie' => $movie]);