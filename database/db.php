<?php

class Db{
    public $connection;

    function __construct() {
        // Tworzy baze, jeśli nie istnieje lub otwiera istniejącą do odczytu i zapisu
        $this->connection = new SQLite3('database/filmyDatabase.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
        $this->connection->enableExceptions(true);

        $this->createMoviesTable();
        $this->createUsersTable();
        $this->createCommentsTable();
    }

    private function createMoviesTable() {
        // Tworzymy tabelę jeśli jeszcze nie została stworzona
        $this->connection->query('CREATE TABLE IF NOT EXISTS "filmy" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "tytul" VARCHAR,
            "opis" VARCHAR,
            "url" VARCHAR,
            "rok_produkcji" INTEGER,
            "kategoria" VARCHAR,
            "data_dodania" DATETIME
        )');
    }

    private function createUsersTable() {
        // Tworzymy tabelę jeśli jeszcze nie została stworzona
        $this->connection->query('CREATE TABLE IF NOT EXISTS "uzytkownicy" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "login" VARCHAR,
            "haslo" VARCHAR
        )');
    }

    private function createCommentsTable() {
        // Tworzymy tabelę jeśli jeszcze nie została stworzona
        $this->connection->query('CREATE TABLE IF NOT EXISTS "komentarze" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "id_filmu" INTEGER,
            "id_uzytkownika" INTEGER,
            "komentarz" VARCHAR,
            FOREIGN KEY(id_filmu) REFERENCES filmy(id),
            FOREIGN KEY(id_uzytkownika) REFERENCES uzytkownicy(id)
        )');
    }

    function __destruct() {
        // Zamykamy połączenie z bazą danych
        $this->connection->close();
    }

    public function populateTestData() {
        // Dodajemy dane testowe
        // TODO: każdy z elementów dodaje się dwa razy
        $this->connection->exec('BEGIN');
        $this->connection->query('INSERT INTO filmy ("tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
            VALUES ("Obcy - ósmy pasażer Nostromo",
            "Załoga statku kosmicznego Nostromo (kapitan Dallas, Ash, Kane, Brett, Parker, Lambert, Ripley) zostaje obudzona 
            ze stanu hibernacji przez tajemniczy sygnał S.O.S. z pobliskiej planety. Podczas akcji ratunkowej natrafiają 
            na obcą formę życia. Jeden z członków załogi, Kane, zostaje przez nią zaatakowany. 
            Lambert i Dallas wnoszą go na pokład statku nie wiedząc, jak ogromny popełnili błąd. ",
            "",
            1979,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")');
        $this->connection->query('INSERT INTO filmy ("tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
           VALUES ("Test",
           "Lorem ispum",
           "",
           2020,
           "Komedia",
           "' . date('Y-m-d H:i:s') . '")');
        $this->connection->query('INSERT INTO filmy ("tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
            VALUES ("Test2",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et soluta illo molestiae ratione impedit 
            maiores voluptas hic veniam autem blanditiis, pariatur facilis explicabo nesciunt neque id ad magni rerum.",
            "",
            1999,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")');
        $this->connection->exec('COMMIT');
    }

    public function executeQuery($query) {
    $statement = $this->connection->prepare($query);
    // TODO: dodać $statement->bindValue(':id', $id); np. w wywołaniu funkcji dla każdego elementu tablicy, przekazanej jako drugi parametr
    $results = $statement->execute();

    $multiArray = [];
    while($result = $results->fetchArray(SQLITE3_ASSOC)) {
        $multiArray[] = $result;
    }

    // Trzeba zwolnić pamięć zapytania, gdy go już nie potrzebujemy
    $results->finalize();

    return $multiArray;
    }
}

return new Db();