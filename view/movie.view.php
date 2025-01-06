<?php

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
?>

<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <form method="post">
            
            <span class="close" onclick="closeAddMovieModal()">&times;</span>

            <h2>Dodaj film do obecnej kategorii</h2>

            <label for="title">Proszę podać tytuł filmu:</label>
            <br>
            <input type="text" id="title" name="title" placeholder="Tytuł filmu" required>
            <br><br>

            <label for="description">Proszę napisać opis:</label>
            <br>
            <input type="text" id="description" name="description" placeholder="Opis filmu" required>
            <br><br>

            <label for="url">Proszę podać ścieżkę do filmu na dysku:</label>
            <br>
            <input type="text" id="url" name="url" placeholder="URL do filmy na dysku" required>
            <br><br>

            <label for="year">Proszę podać rok premiery:</label>
            <br>
            <input type="text" id="year" name="year" placeholder="Rok produkcji" required>
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
                        url: "'.$movie['url'].'",
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