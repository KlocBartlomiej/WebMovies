<?php 
$title = 'Proszę się zalogować aby uzyskać dostęp do serwisu';
view('partials/header.view.php', [ 'title' => $title ]);
?>

<div class="black-box">
    <form method="post">
        <br><br>

        <label for="login">Proszę podać login:</label>
        <br>
        <input type="text" id="login" name="login" placeholder="login" required>
        <br><br>
            
        <label for="password">Proszę podać haslo:</label>
        <br>
        <input type="text" id="password" name="password" placeholder="haslo" required>
        <br><br><br>

        <input type="submit" name="log-in" value="Zaloguj">

        <br><br>
    </form>
</div>

<script>
    function showMovies(){}
</script>

<?php view('partials/footer.view.php'); ?>