<?php

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let movies = [];
        <?php
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
            }
        ?>
        movies.forEach(movie => displayMovie(movie));
    });
</script>

<?php view('partials/footer.view.php'); ?>