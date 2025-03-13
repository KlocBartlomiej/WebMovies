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

<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <form method="post" enctype="multipart/form-data">
            <span class="close" onclick="closeAddMovieModal()">&times;</span>

            <h2>Dodaj film</h2>

            <label for="tytul">Proszę podać tytuł filmu:</label>
            <br>
            <input type="text" id="tytul" name="tytul" placeholder="Tytuł filmu" required>
            <br><br>

            <label for="opis">Proszę napisać opis:</label>
            <br>
            <input type="text" id="opis" name="opis" placeholder="Opis filmu" required>
            <br><br>

            <label for="sciezka_do_filmu">Proszę podać ścieżkę do filmu na dysku:</label>
            <br>
            <input type="text" id="sciezka_do_filmu" name="sciezka_do_filmu" placeholder="ścieżka do filmu na dysku" required>
            <br><br>

            <label for="sciezka_do_okladki">Proszę podać ścieżkę do okładki na dysku:</label>
            <br>
            <input type="file" id="sciezka_do_okladki" name="sciezka_do_okladki" placeholder="ścieżka do okładki na dysku" accept="image/*" required>
            <br><br>

            <label for="kategoria">Proszę podać kategorie:</label>
            <br>
            <select id="kategoria" name="kategoria" required>
                <option value="" selected disabled> -- Kategoria -- </option>
                <option value="Akcja">Akcja</option>
                <option value="Dramat">Dramat</option>
                <option value="Komedia">Komedia</option>
                <option value="Horror">Horror</option>
                <option value="Thriller">Thriller</option>
                <option value="Science Fiction">Science Fiction</option>
                <option value="Animacja">Animacja</option>
            </select>
            <br><br>

            <label for="rok">Proszę podać rok premiery:</label>
            <br>
            <input type="text" id="rok" name="rok" placeholder="Rok produkcji" required>
            <br><br><br>

            <input type="submit" name="addMovie" value="Dodaj Film">
        </form>
    </div>
</div>

<?php view('partials/footer.view.php'); ?>