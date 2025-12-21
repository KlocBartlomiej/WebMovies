// PANEL BOCZNY - POKAZYWANIE I ZAMYKANIE
function openDrawer(movie) {
  document.getElementById("movieDetailsDrawer").classList.add("open");
  // TODO ajax call zamiast uzupełniania statycznego
  // performance chcemy szczegóły tylko jednego filmu i nie zwracać aż tyle danych przy otwieraniu strony
  document.getElementById("drawerMovieContent").innerHTML = `
    <div class="movie" width=100% height=100%>
    <div style="float: left; width: 20%;">
        <img src="img/covers/<?= basename($movie['sciezka_do_okladki']) ?>" alt="Okładka filmu">
    </div>
    <div style="float: left; width: 80%;">
        <h2>Film "<?= $movie['tytul'] ?>" należy do kategorii - <?= $movie['kategoria'] ?>.</h2>
        <h3>Został dodany do kolekcji dnia <?= substr($movie['data_dodania'], 0, 10) ?>, o godzinie <?= substr($movie['data_dodania'], 10) ?></h3>
        <br>
        <p><?= $movie['opis'] ?></p>
    </div>
    <div style="clear: both;"></div>

    <?php
    if ($_SESSION['isAdmin']) {
        echo '<a href="/edytuj?id=' . $movie['id'] . '"><button style="margin-left: 25px;">Edytuj</button></a>';
        echo '<a href="/usun?id=' . $movie['id'] . '"><button style="margin-left: 25px;">Usuń</button></a>';
    }
    ?>

    <br>
    <form method="post">
        <input hidden name="id_filmu" value="<?= $movie['id'] ?>">
        <input hidden name="nick" value="<?= $_SESSION['nick'] ?>">

        <h4>Dodaj swój komentarz:</h4>
        <input type="text" name="comment" placeholder="Dodaj komentarz">
        <input type="submit" name="addComment" value="Dodaj">
    </form>

    <br>
</div>

<?php foreach ($comments as $comment) : ?>
    <br>
    <div class="movie" width=100% height=100%>
        <h3><?= $comment['nazwa_uzytkownika'] ?> napisał(a):</h3>
        <h4><?= $comment['komentarz'] ?></h4>
        <?php if ($_SESSION['isAdmin']) : ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                <input type="submit" name="deleteComment" value="Usuń">
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
  `;
}
function closeDrawer() {
  document.getElementById("movieDetailsDrawer").classList.remove("open");
  document.getElementById("drawerMovieContent").innerHTML = "";
}

function addEventListenerForDetails(movie) {
  // Panel zamyka się po kliknięciu w tło (poza panelem)
  document.addEventListener("click", function (event) {
    const drawer = document.getElementById("movieDetailsDrawer");
    if (
      drawer &&
      !drawer.contains(event.target) &&
      drawer.classList.contains("open")
    ) {
      closeDrawer();
    }
  });

  // Zatrzymanie propagacji kliknięcia wewnątrz panelu
  const drawerElement = document.getElementById("movieDetailsDrawer");
  if (drawerElement) {
    drawerElement.addEventListener("click", function (event) {
      event.stopPropagation();
    });
  }
}
