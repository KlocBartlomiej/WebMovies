function displayMovie(movie) {
  const movieDiv = document.createElement("div");
  movieDiv.className = "movie";
  movieDiv.innerHTML = `
        <div width=100% height=100%">
            <a href="/szczegoly?id=${movie.id}"><h3>${movie.tytul} (${movie.rok_produkcji})</h3></a>
        </div>
    `;

  document.getElementById("movies").appendChild(movieDiv);
}

function addEventListenerForDetails(movie) {
  // TODO add drawer for a movie details
}