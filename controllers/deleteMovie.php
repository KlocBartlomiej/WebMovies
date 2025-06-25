<?php

if (!$_SESSION['isAdmin']) {
    abort(403);
}

if (isset($_POST['deleteMovie'])) {
    $db->deleteMovie($_POST['id']);
    header('Location: /');
    exit();
}

$movie = getMovie($db, $_GET['id']);

if (!$movie) {
    abort();
}

view('deleteMovie.view.php', ['movie' => $movie]);