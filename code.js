let editIndex = -1; // Zmienna do edycji

    document.addEventListener('DOMContentLoaded', loadMovies);

    function toggleCategory(categoryId) {
        const moviesDiv = document.getElementById(categoryId).querySelector('.movies');
        moviesDiv.classList.toggle('hidden');
    }

    function openAddMovieModal() {
        document.getElementById('addMovieModal').style.display = "block";
    }

    function closeAddMovieModal() {
        document.getElementById('addMovieModal').style.display = "none";
        clearForm();
    }

    function addMovie() {
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const image = document.getElementById('image').value;
        const year = document.getElementById('year').value;
        const category = document.getElementById('category').value;

        if (title && description && image && year) {
            const movie = { title, description, image, year, category };
            if (editIndex >= 0) {
                updateMovie(movie);
            } else {
                saveMovie(movie);
            }

            closeAddMovieModal();
        }
    }

    function saveMovie(movie) {
        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        movies.push(movie);
        localStorage.setItem('movies', JSON.stringify(movies));
        displayMovie(movie);
    }

    function loadMovies() {
        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        movies.forEach(movie => displayMovie(movie));
    }

    function displayMovie(movie) {
        const movieDiv = document.createElement('div');
        movieDiv.className = 'movie';
        movieDiv.innerHTML = `
            <img src="${movie.image}" alt="${movie.title}" onclick="showModal('${movie.title}', '${movie.description}', '${movie.image}', '${movie.year}')">
            <div>
                <h3>${movie.title} (${movie.year})</h3>
                <p>${movie.description}</p>
                <div class="comments">
                    <h4>Komentarze:</h4>
                    <input type="text" placeholder="Dodaj komentarz">
                    <button onclick="addComment(event)">Dodaj</button>
                    <ul></ul>
                </div>
                <button onclick="editMovie('${movie.title}', '${movie.description}', '${movie.image}', '${movie.year}', '${movie.category}')">Edytuj</button>
                <button onclick="deleteMovie('${movie.title}')">Usuń</button>
            </div>
        `;

        document.getElementById(movie.category).querySelector('.movies').appendChild(movieDiv);
    }

    function clearForm() {
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('image').value = '';
        document.getElementById('year').value = '';
        editIndex = -1; // Resetuj indeks edycji
    }

    function editMovie(title, description, image, year, category) {
        document.getElementById('title').value = title;
        document.getElementById('description').value = description;
        document.getElementById('image').value = image;
        document.getElementById('year').value = year;
        document.getElementById('category').value = category;
        editIndex = Array.from(document.querySelectorAll('.movie')).findIndex(m => m.querySelector('h3').textContent.includes(title));
        openAddMovieModal(); // Otwórz modal do edycji
    }

    function updateMovie(updatedMovie) {
        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        movies[editIndex] = updatedMovie; // Zaktualizuj film w tablicy
        localStorage.setItem('movies', JSON.stringify(movies));
        refreshMoviesDisplay();
    }

    function deleteMovie(title) {
        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        movies = movies.filter(movie => movie.title !== title); // Usuń film
        localStorage.setItem('movies', JSON.stringify(movies));
        refreshMoviesDisplay();
    }

    function refreshMoviesDisplay() {
        document.querySelectorAll('.movies').forEach(movieList => movieList.innerHTML = ''); // Wyczyść wyświetlone filmy
        loadMovies(); // Załaduj filmy ponownie
    }

    function addComment(event) {
        const input = event.target.previousElementSibling;
        const commentText = input.value;
        if (commentText) {
            const commentList = event.target.nextElementSibling;
            const newComment = document.createElement('li');
            newComment.textContent = commentText;
            commentList.appendChild(newComment);
            input.value = '';
        }
    }

    function showModal(title, description, image, year) {
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-description').textContent = description;
        document.getElementById('modal-image').src = image;
        document.getElementById('modal-year').textContent = `Rok: ${year}`;
        document.getElementById('movieModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('movieModal').style.display = "none";
    }

    function searchMovies() {
        const titleQuery = document.getElementById('search-title').value.toLowerCase();
        const yearQuery = document.getElementById('search-year').value;

        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        const foundMovies = movies.filter(movie => {
            const matchesTitle = movie.title.toLowerCase().includes(titleQuery);
            const matchesYear = movie.year.includes(yearQuery);
            return matchesTitle && (yearQuery === '' || matchesYear);
        });

        if (foundMovies.length > 0) {
            showModal(foundMovies[0].title, foundMovies[0].description, foundMovies[0].image, foundMovies[0].year);
        } else {
            alert("Nie znaleziono filmów pasujących do kryteriów.");
        }
    }