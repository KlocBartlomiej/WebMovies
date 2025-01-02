<?php

class Db{
    private $connection;

    public function __construct() {
        try{
            $this->connection = new PDO("sqlite:database/filmyDatabase.sqlite");
        }
        catch( PDOException $Exception ) {
            echo 'Nie można połączyć się z bazą danych' . $Exception->getMessage() . ' , ' . $Exception->getCode( );
            die();
        }

        $this->createMoviesTable();
        $this->createUsersTable();
        $this->createCommentsTable();
    }

    private function createMoviesTable() {
        $this->connection->query('CREATE TABLE IF NOT EXISTS "filmy" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "tytul" VARCHAR NOT NULL,
            "opis" VARCHAR,
            "url" VARCHAR,
            "rok_produkcji" INTEGER,
            "kategoria" VARCHAR NOT NULL,
            "data_dodania" DATETIME NOT NULL
        )');
    }

    private function createUsersTable() {
        $this->connection->query('CREATE TABLE IF NOT EXISTS "uzytkownicy" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "login" VARCHAR NOT NULL UNIQUE,
            "haslo" VARCHAR NOT NULL
        )');
    }

    private function createCommentsTable() {
        $this->connection->query('CREATE TABLE IF NOT EXISTS "komentarze" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "id_filmu" INTEGER NOT NULL,
            "id_uzytkownika" INTEGER NOT NULL,
            "komentarz" VARCHAR NOT NULL,
            FOREIGN KEY(id_filmu) REFERENCES filmy(id),
            FOREIGN KEY(id_uzytkownika) REFERENCES uzytkownicy(id)
        )');
    }

    public function __destruct() {
        $this->connection->close();
    }

    public function populateTestData() {
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
            VALUES (1, "Obcy - ósmy pasażer Nostromo",
            "Załoga statku kosmicznego Nostromo (kapitan Dallas, Ash, Kane, Brett, Parker, Lambert, Ripley) zostaje obudzona 
            ze stanu hibernacji przez tajemniczy sygnał S.O.S. z pobliskiej planety. Podczas akcji ratunkowej natrafiają 
            na obcą formę życia. Jeden z członków załogi, Kane, zostaje przez nią zaatakowany. 
            Lambert i Dallas wnoszą go na pokład statku nie wiedząc, jak ogromny popełnili błąd. ",
            "",
            1979,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
           VALUES (2, "Test",
           "Lorem ispum",
           "",
           2020,
           "Komedia",
           "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "url", "rok_produkcji", "kategoria", "data_dodania")
            VALUES (3, "Test2",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et soluta illo molestiae ratione impedit 
            maiores voluptas hic veniam autem blanditiis, pariatur facilis explicabo nesciunt neque id ad magni rerum.",
            "",
            1999,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")')->execute();
    }

    public function executeSelectQuery($query) {
        return $this->connection->query($query)->fetchAll();
    }
}

return new Db();