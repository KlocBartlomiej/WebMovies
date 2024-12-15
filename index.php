<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Lista Filmów</title>
    <meta name="description" content="filmy">
    <meta name="keywords" content="film">
    <meta name="author" content="Krzysztof Suwała">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

    <link rel=icon” href=“favicon.ico” type=“image/x-icon”>
    <link rel="stylesheet" href="main.css">
    <script src="code.js"></script>
</head>
    <body>
                
        <h1>Lista Filmów</h1>

        <div class="navbar">
            <div onclick="toggleCategory('action')">Filmy Akcji</div>
            <div onclick="toggleCategory('drama')">Dramaty</div>
            <div onclick="toggleCategory('comedy')">Komedia</div>
            <div onclick="toggleCategory('horror')">Horror</div>
            <div onclick="toggleCategory('thriller')">Thriller</div>
            <div onclick="toggleCategory('sci-fi')">Science Fiction</div>
            <div onclick="toggleCategory('animation')">Animacja</div>
            <button class="add-movie-button" onclick="openAddMovieModal()">Dodaj Film</button>
        </div>

        <div class="search-form">
            <input type="text" id="search-title" placeholder="Szukaj po tytule">
            <input type="text" id="search-year" placeholder="Szukaj po roku">
            <button onclick="searchMovies()">Szukaj</button>
        </div>

        <!-- Modal dla dodawania filmów -->
        <div id="addMovieModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAddMovieModal()">&times;</span>
                <h2>Dodaj Film</h2>
                <input type="text" id="title" placeholder="Tytuł filmu" required>
                <input type="text" id="description" placeholder="Opis filmu" required>
                <input type="text" id="image" placeholder="URL do okładki" required>
                <input type="text" id="year" placeholder="Rok produkcji" required>
                <select id="category">
                    <option value="action">Filmy Akcji</option>
                    <option value="drama">Dramaty</option>
                    <option value="comedy">Komedia</option>
                    <option value="horror">Horror</option>
                    <option value="thriller">Thriller</option>
                    <option value="sci-fi">Science Fiction</option>
                    <option value="animation">Animacja</option>
                </select>
                <button onclick="addMovie()">Dodaj Film</button>
            </div>
        </div>

        <div class="category" id="action">
            <h2>Filmy Akcji</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="drama">
            <h2>Dramaty</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="comedy">
            <h2>Komedia</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="horror">
            <h2>Horror</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="thriller">
            <h2>Thriller</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="sci-fi">
            <h2>Science Fiction</h2>
            <div class="movies hidden"></div>
        </div>

        <div class="category" id="animation">
            <h2>Animacja</h2>
            <div class="movies hidden"></div>
        </div>

        <!-- Modal dla szczegółów filmu -->
        <div id="movieModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3 id="modal-title"></h3>
                <img id="modal-image" src="" alt="" style="max-width: 100px; margin-bottom: 10px;">
                <p id="modal-description"></p>
                <p id="modal-year"></p>
            </div>
        </div>

    </body>
</html>