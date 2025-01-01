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