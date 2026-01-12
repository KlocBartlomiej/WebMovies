<?php

view('partials/header.view.php', ['title' => $title]);
view('partials/menu.view.php');
?>

<script src="scripts/movieDetails.js"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let movies = []
        <?php
        foreach ($movies as $movie) {
            echo 'movies.push({
                        id: "' . $movie['id'] . '",
                        tytul: "' . $movie['tytul'] . '",
                        rok_produkcji: "' . $movie['rok_produkcji'] . '"
                });';
        }
        ?>
        movies.forEach(movie => {
            let movieDiv = document.createElement("div");
            movieDiv.className = "movie";
            movieDiv.innerHTML = `<h3>${movie.tytul} (${movie.rok_produkcji})</h3>`;
            document.getElementById("movies").appendChild(movieDiv);

            movieDiv.addEventListener("click", function () {
                    
                fetch('/movieDrawer/' + movie.id)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            document.getElementById('drawerMovieContent').innerHTML = `<p style="color:#ffbfbf;">${data.error}</p>`;
                        } else {
                            document.getElementById('drawerMovieContent').innerHTML = returnDrawerMovieContent(data);
                        }
                    })
                    .catch(() => {
                        document.getElementById('drawerMovieContent').innerHTML = `<p style="color:red;">Błąd podczas pobierania danych.</p>`;
                    });
                document.getElementById("movieDetailsDrawer").classList.add("open");
            });
        })
    })
</script>

<?php view('partials/drawer.view.php'); ?>
<?php view('partials/footer.view.php'); ?>