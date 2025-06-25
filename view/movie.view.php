<?php

view('partials/header.view.php', ['title' => $title]);
view('partials/menu.view.php');
?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let movies = []
        <?php
        foreach ($movies as $movie) {
            echo 'movies.push({
                        id: "' . $movie['id'] . '",
                        tytul: "' . $movie['tytul'] . '",
                        opis: "' . $movie['opis'] . '",
                        sciezka_do_filmu: "' . $movie['sciezka_do_filmu'] . '",
                        sciezka_do_okladki: "' . $movie['sciezka_do_okladki'] . '",
                        rok_produkcji: "' . $movie['rok_produkcji'] . '",
                        kategoria: "' . $movie['kategoria'] . '",
                        data_dodania: "' . $movie['data_dodania'] . '"
                });';
        }
        ?>
        movies.forEach(movie => {
            displayMovie(movie)
            addEventListenerForDetails(movie)
        });
    });
</script>

<script src="scripts/movieDetails.js"></script>

<?php view('partials/footer.view.php'); ?>