<div class="box">
    <div><a href="/akcja">Filmy Akcji</a></div>
    <div><a href="/dramat">Dramaty</a></div>
    <div><a href="/komedia">Komedia</a></div>
    <div><a href="/horror">Horror</a></div>
    <div><a href="/thriller">Thriller</a></div>
    <div><a href="/sciencefiction">Science Fiction</a></div>
    <div><a href="/animacja">Animacja</a></div>
    <?php
    if ($_SESSION['isAdmin']) {
        echo '<button class="red-button" onclick="openAddMovieModal()">Dodaj Film</button>';
    }
    ?>
    <a href="/wyloguj">
        <button class="red-button">Wyloguj</button>
    </a>
</div>