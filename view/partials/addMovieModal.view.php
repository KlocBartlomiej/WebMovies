<!-- Modal dla dodawania filmów -->
<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <h2>Dodaj film do obecnej kategorii</h2>
        <form method="post">
            <span class="close" onclick="closeAddMovieModal()">&times;</span>
            <input type="text" id="title" name="title" placeholder="Tytuł filmu" required>
            <input type="text" id="description" name="description" placeholder="Opis filmu" required>
            <input type="text" id="url" name="url" placeholder="URL do filmy na dysku" required>
            <input type="text" id="year" name="year" placeholder="Rok produkcji" required>
            <input type="submit" name="addMovie" value="Dodaj Film">
        </form>
    </div>
</div>