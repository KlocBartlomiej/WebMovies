<?php

$categoryTable = [
    '/akcja' => 'Akcja',
    '/dramat' => 'Dramat',
    '/komedia' => 'Komedia',
    '/horror' => 'Horror',
    '/thriller' => 'Thriller',
    '/sciencefiction' => 'Science Fiction',
    '/animacja' => 'Animacja',
];

$titleTable = [
    'Akcja' => 'Filmy Akcji',
    'Dramat' => 'Dramaty',
    'Komedia' => 'Filmy Komediowe',
    'Horror' => 'Horrory',
    'Thriller' => 'Thrillery',
    'Science Fiction' => 'Filmy Science Fiction',
    'Animacja' => 'Filmy Animowane',
];

$category = $categoryTable[$uri];
$title = $titleTable[$category];

$movies = addAndFetch($db, $category);

require 'view/movie.view.php';