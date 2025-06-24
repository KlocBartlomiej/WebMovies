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
        <div width=100% height=100%">
            <a href="/szczegoly/${movie.id}"><h3>${movie.title} (${movie.year})</h3></a>
        </div>
    `;

    document.getElementById("movies").appendChild(movieDiv);
}

function searchMovies() {
    //TODO
}

function togglePreferredTheme() {
    if (document.body.getAttribute("data-theme") === "dark") {
        setTheme("light");
    } else {
        setTheme("dark");
    }
}

function setTheme(themeToSet) {
    document.body.setAttribute("data-theme", themeToSet);
    localStorage.setItem("theme", themeToSet);
}