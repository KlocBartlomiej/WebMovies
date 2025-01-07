<?php

$title = 'Szczegóły filmu "' . $movie['tytul'] . '" (' . $movie['rok_produkcji'] . ')';

view('partials/header.view.php', [ 'title' => $title ]);
view('partials/menu.view.php');
?>

<div class="movie" width=100% height=100%>
    <h2>Film "<?=$movie['tytul']?>" należy do kategorii - <?=$movie['kategoria']?>.</h2>
    <h3>Został dodany do kolekcji dnia <?=substr($movie['data_dodania'],0,10)?>, o godzinie <?=substr($movie['data_dodania'],10)?></h3>
    <br>
    <p><?= $movie['opis'] ?></p>

    <?php 
    if ($_SESSION['logged-in'] == 1) {
        //TODO pozostaje użyć jeszcze $movie['url'] aby spróbować dostać się do filmu i odwtorzyć go w przeglądarce
        echo '<button style="margin-left: 25px;">Obejrzyj online</button>';
        echo '<button style="margin-left: 25px;">Edytuj</button>';
        echo '<button style="margin-left: 25px;">Usuń</button>';
    }
    ?>

    <br>
    <div>
        <h4>Komentarze:</h4>
        <input type="text" placeholder="Dodaj komentarz">
        <button onclick="addComment(event)">Dodaj</button>
    </div>

    <br>
    <div>
        <?php foreach ($comments as $comment) : ?>
            <h4><?= $comment['komentarz'] ?></h4>
        <?php endforeach; ?>
    </div>

</div>

<script>
    function showMovies(){}
</script>

<?php view('partials/footer.view.php'); ?>