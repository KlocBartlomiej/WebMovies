<?php

function getMovie($db, $id)
{
    $movie = $db->executeSelectQuery("SELECT * FROM filmy WHERE id = ?;", [$id]);
    if (count($movie) === 0) {
        abort(404);
    }
    return $movie[0];
}

function fetchMovies($db, $category)
{
    return $db->executeSelectQuery("SELECT * FROM filmy WHERE kategoria = ?;", [$category]);
}

function addMovieIfRequired($db)
{
    if (isset($_POST['addMovie'])) {
        $target_image_dir = base_path("img/covers/");

        // Ensure the directory exists
        if (!is_dir($target_image_dir)) {
            mkdir($target_image_dir, 0777, true);
        }

        $target_cover_file = $target_image_dir . basename($_FILES["sciezka_do_okladki"]["name"]);
        if (!move_uploaded_file($_FILES["sciezka_do_okladki"]["tmp_name"], $target_cover_file)) {
            abort(400); // Błąd przesyłania pliku
        }

        // Debugging
        if (!file_exists($target_cover_file)) {
            dd("File not uploaded: " . $target_cover_file);
        }

        $db->addMovie($target_cover_file);
    }
}

function addAndFetchComments($db, $id_filmu)
{
    if (isset($_POST['addComment'])) {
        $db->addComment($_POST);
    }

    return $db->executeSelectQuery("SELECT * FROM komentarze WHERE id_filmu = ?;", [$id_filmu]);
}
