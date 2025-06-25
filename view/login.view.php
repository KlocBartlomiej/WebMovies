<?php
$title = 'Proszę się zalogować aby uzyskać dostęp do serwisu';
view('partials/header.view.php', [ 'title' => $title ]);
?>

<div class="box">
    <form method="post">
        <br><br>

        <label for="login">Proszę podać login:</label>
        <br>
        <input type="text" id="login" name="login" placeholder="login" required>
        <br><br>

        <label for="password">Proszę podać haslo:</label>
        <br>
        <input type="password" id="password" name="password" placeholder="haslo" required>
        <br><br>

        <label for="nick">Proszę podać nick:<br>(Będzie on widoczny przy Twoich komentarzach)</label>
        <br>
        <input type="text" id="nick" name="nick" placeholder="nick" required>
        <br><br><br>

        <input type="submit" name="log-in" value="Zaloguj">

        <br><br>
    </form>
</div>

<?php view('partials/footer.view.php'); ?>
