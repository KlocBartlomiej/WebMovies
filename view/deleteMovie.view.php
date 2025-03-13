<?php

$title = 'Usuń film "' . $movie['tytul'] . '"';

view('partials/header.view.php', ['title' => $title]);
view('partials/menu.view.php');
?>

<div class="delete-movie-form">
    <form method="post">
        <input type="hidden" name="id" value="<?= $movie['id'] ?>">
        <p>Czy na pewno chcesz usunąć film "<?= $movie['tytul'] ?>"?</p>
        <input type="submit" name="deleteMovie" value="Usuń">
    </form>
</div>

<?php view('partials/footer.view.php'); ?>