<div class="box">
    <div class="menu">
        <a href="/">
            <div class="menu-toggle">Kategorie</div>
        </a>
        <div class="menu-dropdown">
            <a href="/akcja">
                <div class="menu-option">Filmy Akcji</div>
            </a>
            <a href="/dramat">
                <div class="menu-option">Dramaty</div>
            </a>
            <a href="/komedia">
                <div class="menu-option">Komedia</div>
            </a>
            <a href="/horror">
                <div class="menu-option">Horror</div>
            </a>
            <a href="/thriller">
                <div class="menu-option">Thriller</div>
            </a>
            <a href="/sciencefiction">
                <div class="menu-option">Science Fiction</div>
            </a>
            <a href="/animacja">
                <div class="menu-option">Animacja</div>
            </a>
        </div>
    </div>
    <?php
    if ($_SESSION['isAdmin']) {
        echo '<button class="red-button" onclick="openAddMovieModal()">Dodaj Film</button>';
    }
    ?>
    <a href="/wyloguj">
        <button class="red-button">Wyloguj</button>
    </a>
</div>