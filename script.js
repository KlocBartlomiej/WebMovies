function openAddMovieModal() {
    document.getElementById('addMovieModal').style.display = "block";
}

function closeAddMovieModal() {
    document.getElementById('addMovieModal').style.display = "none";
    clearForm();
}

function showMovieModal() {
    document.getElementById('movieModal').style.display = "block";
}

function closeMovieModal() {
    document.getElementById('movieModal').style.display = "none";
}

function displayMovie(movie) {
    const movieDiv = document.createElement('div');
    movieDiv.className = 'movie';
    movieDiv.innerHTML = `
        <div width=100% height=100% style="text-align: center;">
            <h3 style="text-align:center;">${movie.title} (${movie.year})</h3>
            <p>${movie.description}</p>
            <a href="/szczegoly/${movie.id}"><button>Pokaż szczegóły</button></a>
        </div>
    `;

    document.getElementById("movies").appendChild(movieDiv);
}

function searchMovies() {
    //TODO
}