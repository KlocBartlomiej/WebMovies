<?php

$title = 'Szczegóły filmu "' . $movie['tytul'] . '" (' . $movie['rok_produkcji'] . ')';

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
?>

<div class="movie" width=100% height=100%>
    <div style="float: left; width: 20%;">
        <img src="img/covers/<?= basename($movie['sciezka_do_okladki']) ?>" alt="Okładka filmu">
    </div>
    <div style="float: left; width: 80%;">
        <h2>Film "<?=$movie['tytul']?>" należy do kategorii - <?=$movie['kategoria']?>.</h2>
        <h3>Został dodany do kolekcji dnia <?=substr($movie['data_dodania'],0,10)?>, o godzinie <?=substr($movie['data_dodania'],10)?></h3>
        <br>
        <p><?= $movie['opis'] ?></p>
    </div>
    <div style="clear: both;"></div>

    <?php
    if ($_SESSION['logged-in'] == 1) {
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

<!-- <div>
    <?php foreach ($comments as $comment) : ?>
        <br>
        <div class="movie" width=100% height=100%>
        <h3><?= $comment['nazwa_uzytkownika'] ?>  napisał(a):</h3>
        <h4><?= $comment['komentarz'] ?></h4>
        <?php if ($_SESSION['logged-in'] == 1) : ?>
            <form method="post" style="display:inline;">
                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                <input type="submit" name="deleteComment" value="Usuń">
            </form>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div> -->

<?php view('partials/footer.view.php'); ?>
