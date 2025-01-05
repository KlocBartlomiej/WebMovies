<?php

$movie = getMovie($db, $id);

if (!$movie) {
    abort();
}

//TODO należy także zwrócić wszystkie komentarze, jakie do tej pory zostały dodane do filmu

require 'view/movieDetails.view.php';