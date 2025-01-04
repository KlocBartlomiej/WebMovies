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
            <!-- Ta sekcja zostanie skopiowana do podstrony ze szczegółami danego filmu, tylko tam będzie można dodawać komentarze
                <div class="comments">
                <h4>Komentarze:</h4>
                <input type="text" placeholder="Dodaj komentarz">
                <button onclick="addComment(event)">Dodaj</button>
                <ul></ul>
            </div>
            <button onclick="editMovie('${movie.title}', '${movie.description}', '${movie.url}', '${movie.year}', '${movie.category}')">Edytuj</button>
            <button onclick="deleteMovie('${movie.title}')">Usuń</button>-->
            <button>Pokaż szczegóły</button>
        </div>
    `;

    document.getElementById("movies").appendChild(movieDiv);
}

function searchMovies() {
    //TODO
}