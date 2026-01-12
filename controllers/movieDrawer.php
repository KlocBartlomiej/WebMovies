<?php

header('Content-Type: application/json');

// if (isset($_POST['deleteComment'])) {
//     $db->deleteComment($_POST['comment_id']);
// }

$movieId = array_reverse($uriExp)[0];
$movie = getMovie($db, $movieId);

if (!$movie) {
    echo json_encode(['error' => 'Nie znaleziono filmu']);
    exit;
}

$comments = addAndFetchComments($db, $movieId);
echo json_encode([ 'movie' => $movie, 'comments' => $comments]);