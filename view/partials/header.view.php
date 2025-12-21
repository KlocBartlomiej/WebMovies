<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Lista Filmów</title>
    <meta name="description" content="filmy">
    <meta name="keywords" content="film">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

    <link rel=icon” href=“favicon.ico” type=“image/x-icon”>
    <link rel="stylesheet" href="/styles.css">
    <script src="scripts/movie.js" defer></script>
    <script src="scripts/theme.js" defer></script>
</head>

<body>
    <h1><?= $title ?></h1>
    <button onclick="togglePreferredTheme()" class="red-button" style="position:fixed; top:50px; right:30px;">
        🌗 Motyw
    </button>