<?php view('partials/addMovieModal.view.php'); ?>
<div class="movies" id="movies"></div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem("theme")) {
            setTheme(localStorage.getItem("theme"));
        }
    });
</script>
</body>

</html>