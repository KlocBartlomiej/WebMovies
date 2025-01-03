        <div class="category" id="category">
            <h2><?=$category?></h2>
            <div class="movies" id="movies"></div>
        </div>
    <script src="script.js"></script>
    <script type="text/javascript">
    (function(){
        let movies = [];
        <?php
            $elementNumber = 1;
            foreach ($movies as $movie) {
                echo 'movies.push({
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
    })();
    </script>
    </body>
</html>