<?php

if ($_SESSION['logged-in'] != 1) {
    abort(403);
}

if (isset($_POST['editMovie'])) {
    $db->updateMovie($_POST);
    header('Location: /szczegoly/' . $_POST['id']);
    exit();
}

$movie = getMovie($db, $_GET['id']);

if (!$movie) {
    abort();
}

view('editMovie.view.php', ['movie' => $movie]);