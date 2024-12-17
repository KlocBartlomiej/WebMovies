<?php
    // Tworzy baze, jeśli nie istnieje lub otwiera istniejącą do odczytu i zapisu
    $db = new SQLite3('filmyDatabase.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    $db->enableExceptions(true);

    // Tworzymy tabelę jeśli jeszcze nie została stworzona
    $db->query('CREATE TABLE IF NOT EXISTS "filmy" (
        "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
        "tytul" VARCHAR,
        "opis" VARCHAR,
        "url" VARCHAR,
        "rok_produkcji" INTEGER,
        "kategoria" VARCHAR,
        "data_dodania" DATETIME
    )');

    // Dodajemy dane testowe
    // $db->exec('BEGIN');
    // $db->query('INSERT INTO filmy ("tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
    //     VALUES ("Harry Potter i kiełbasa prymasa", "Przygody młodego czarodzieja.", "", 2020, "Thriller", "' . date('Y-m-d H:i:s') . '")');
    // $db->query('INSERT INTO filmy ("tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
    //     VALUES ("Harry Potter i kamień fizjologiczny", "Jakiś opis kurde", "", 2020, "Dramat", "' . date('Y-m-d H:i:s') . '")');
    // $db->exec('COMMIT');

    // Wyciągamy dane z bazy i wyświetlamy
    $statement = $db->prepare('SELECT * FROM filmy');
    $result = $statement->execute();

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        ?>
        <h2>Następny wynik:</h2>
        <pre>
            <?= print_r($row) ?>
        </pre>
        <?php
    }
    // Trzeba zwolnić pamięć zapytania, gdy go już nie potrzebujemy
    $result->finalize();

    // Zamykamy połączenie z bazą danych
    $db->close();