function openAddMovieModal() {
  document.getElementById("addMovieModal").style.display = "block";
}

function closeAddMovieModal() {
  document.getElementById("addMovieModal").style.display = "none";
}

function showMovieModal() {
  document.getElementById("movieModal").style.display = "block";
}

function closeMovieModal() {
  document.getElementById("movieModal").style.display = "none";
}

function searchMovies() {
  //TODO
}

function displayMovie(movie) {
  const movieDiv = document.createElement("div");
  movieDiv.className = "movie";
  movieDiv.innerHTML = `
        <div width=100% height=100%">
            ${movie.id}<h3>${movie.tytul} (${movie.rok_produkcji})</h3>
        </div>
      `;
  document.getElementById("movies").addEventListener("click", function () {
    openDrawer(movie);
  });
  document.getElementById("movies").appendChild(movieDiv);
}
