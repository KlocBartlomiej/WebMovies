<div class="movie" width=100% height=100% style="text-align: center;">
    <h2>Film "<?=$movie['tytul']?>" należy do kategorii - <?=$movie['kategoria']?>.</h2>
    <h3>Został dodany do kolekcji dnia <?=substr($movie['data_dodania'],0,10)?>, o godzinie <?=substr($movie['data_dodania'],10)?></h3>
    <p><?= $movie['opis'] ?></p>

    <button>Obejrzyj online</button>
    <button>Edytuj</button>
    <button>Usuń</button>

    <div class="addComment">
        <h4>Komentarze:</h4>
        <input type="text" placeholder="Dodaj komentarz">
        <button onclick="addComment(event)">Dodaj</button>
    </div>

    <div class="comments">
    </div>

</div>