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
//     const movieDiv = document.createElement('div');
//     movieDiv.className = 'movie';
//     movieDiv.innerHTML = `
//         <img src="${movie.image}" alt="${movie.title}" onclick="showModal('${movie.title}', '${movie.description}', '${movie.image}', '${movie.year}')">
//         <div>
//             <h3>${movie.title} (${movie.year})</h3>
//             <p>${movie.description}</p>
//             <div class="comments">
//                 <h4>Komentarze:</h4>
//                 <input type="text" placeholder="Dodaj komentarz">
//                 <button onclick="addComment(event)">Dodaj</button>
//                 <ul></ul>
//             </div>
//             <button onclick="editMovie('${movie.title}', '${movie.description}', '${movie.image}', '${movie.year}', '${movie.category}')">Edytuj</button>
//             <button onclick="deleteMovie('${movie.title}')">Usuń</button>
//         </div>
//     `;

//     document.getElementById(movie.category).querySelector('.movies').appendChild(movieDiv);
}

function searchMovies() {
    //TODO
}