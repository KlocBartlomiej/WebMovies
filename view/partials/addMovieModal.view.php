<!-- Modal dla dodawania filmów -->
<div id="addMovieModal" class="modal">
    <div class="modal-content">
        <form method="post">
            
            <span class="close" onclick="closeAddMovieModal()">&times;</span>
            
            <h2>Dodaj film do obecnej kategorii</h2>
            
            <label for="title">Proszę podać tytuł filmu:</label>
            <br>
            <input type="text" id="title" name="title" placeholder="Tytuł filmu" required>
            <br><br>
            
            <label for="description">Proszę napisać opis:</label>
            <br>
            <input type="text" id="description" name="description" placeholder="Opis filmu" required>
            <br><br>
            
            <label for="url">Proszę podać ścieżkę do filmu na dysku:</label>
            <br>
            <input type="text" id="url" name="url" placeholder="URL do filmy na dysku" required>
            <br><br>
            
            <label for="year">Proszę podać rok premiery:</label>
            <br>
            <input type="text" id="year" name="year" placeholder="Rok produkcji" required>
            <br><br><br>

            <input type="submit" name="addMovie" value="Dodaj Film">
        </form>
    </div>
</div>