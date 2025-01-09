<?php

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
?>

<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <form method="post">
            
            <span class="close" onclick="closeAddMovieModal()">&times;</span>

            <h2>Dodaj film do obecnej kategorii</h2>

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
            <input type="text" id="sciezka_do_filmu" name="sciezka_do_filmu" placeholder="sciezka_do_filmu do filmy na dysku" required>
            <br><br>

            <label for="sciezka_do_okladki">Proszę podać ścieżkę do filmu na dysku:</label>
            <br>
            <input type="text" id="sciezka_do_okladki" name="sciezka_do_okladki" placeholder="Rok produkcji" required>
            <br><br>

            <label for="kategoria">Proszę podać rok premiery:</label>
            <br>
            <input type="text" id="kategoria" name="kategoria" placeholder="Kategoria" required>
            <br><br>

            <label for="rok">Proszę podać rok premiery:</label>
            <br>
            <input type="text" id="rok" name="rok" placeholder="Rok produkcji" required>
            <br><br><br>

            <input type="submit" name="addMovie" value="Dodaj Film">
        </form>
    </div>
</div>

<script type="text/javascript">
    function showMovies(){
        let movies = [];
        <?php
            $elementNumber = 1;
            foreach ($movies as $movie) {
                echo 'movies.push({
                        id: "'.$movie['id'].'",
                        title: "'.$movie['tytul'].'",
                        description: "'.$movie['opis'].'",
                        sciezka_do_filmu: "'.$movie['sciezka_do_filmu'].'",
                        sciezka_do_okladki: "'.$movie['sciezka_do_okladki'].'",
                        year: "'.$movie['rok_produkcji'].'",
                        category: "'.$movie['kategoria'].'",
                        addDate: "'.$movie['data_dodania'].'"
                });
                ';
                $elementNumber++;
            }
        ?>
        movies.forEach(movie => displayMovie(movie));
    };
</script>


<?php view('partials/footer.view.php'); ?>