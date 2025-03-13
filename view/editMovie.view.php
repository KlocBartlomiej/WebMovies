<?php

$title = 'Edytuj film "' . $movie['tytul'] . '"';

view('partials/header.view.php', ['title' => $title]);
view('partials/menu.view.php');
?>

<div class="edit-movie-form">
    <form method="post">
        <input type="hidden" name="id" value="<?= $movie['id'] ?>">

        <label for="tytul">Tytuł:</label>
        <input type="text" id="tytul" name="tytul" value="<?= $movie['tytul'] ?>" required>
        
        <label for="opis">Opis:</label>
        <input type="text" id="opis" name="opis" value="<?= $movie['opis'] ?>" required>
        
        <label for="sciezka_do_filmu">Ścieżka do filmu:</label>
        <input type="text" id="sciezka_do_filmu" name="sciezka_do_filmu" value="<?= $movie['sciezka_do_filmu'] ?>" required>
        
        <label for="sciezka_do_okladki">Ścieżka do okładki:</label>
        <input type="text" id="sciezka_do_okladki" name="sciezka_do_okladki" value="<?= $movie['sciezka_do_okladki'] ?>" required>
        
        <label for="rok">Rok produkcji:</label>
        <input type="text" id="rok" name="rok" value="<?= $movie['rok_produkcji'] ?>" required>
        
        <label for="kategoria">Kategoria:</label>
        <input type="text" id="kategoria" name="kategoria" value="<?= $movie['kategoria'] ?>" required>
        
        <input type="submit" name="editMovie" value="Zapisz zmiany">
    </form>
</div>

<?php view('partials/footer.view.php'); ?>