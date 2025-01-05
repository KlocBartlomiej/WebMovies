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