<?php

class Db{
    private $connection;

    public function __construct() {
        try{
            $this->connection = new PDO("sqlite:file:" . BASE_PATH . "database/filmyDatabase.sqlite");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            "sciezka_do_filmu" VARCHAR,
            "sciezka_do_okladki" VARCHAR,
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
            "nazwa_uzytkownika" VARCHAR NOT NULL,
            "komentarz" VARCHAR NOT NULL,
            "data_dodania" DATETIME NOT NULL,
            FOREIGN KEY(id_filmu) REFERENCES filmy(id)
        )');
    }

    public function __destruct() {
        $this->connection = null;
    }

    public function populateTestData() {
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "sciezka_do_filmu", "sciezka_do_okladki", "rok_produkcji", "kategoria", "data_dodania")
            VALUES (1, "Obcy - ósmy pasażer Nostromo",
            "Załoga statku kosmicznego Nostromo (kapitan Dallas, Ash, Kane, Brett, Parker, Lambert, Ripley) zostaje obudzona ze stanu hibernacji przez tajemniczy sygnał S.O.S. z pobliskiej planety. Podczas akcji ratunkowej natrafiają na obcą formę życia. Jeden z członków załogi, Kane, zostaje przez nią zaatakowany. Lambert i Dallas wnoszą go na pokład statku nie wiedząc, jak ogromny popełnili błąd.",
            "","",
            1979,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "sciezka_do_filmu", "sciezka_do_okladki", "rok_produkcji", "kategoria", "data_dodania")
           VALUES (2, "Test",
           "Lorem ispum",
           "","",
           2020,
           "Komedia",
           "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO filmy ("id", "tytul", "opis", "sciezka_do_filmu", "sciezka_do_okladki", "rok_produkcji", "kategoria", "data_dodania")
            VALUES (3, "Test2",
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et soluta illo molestiae ratione impedit maiores voluptas hic veniam autem blanditiis, pariatur facilis explicabo nesciunt neque id ad magni rerum.",
            "","",
            1999,
            "Horror",
            "' . date('Y-m-d H:i:s') . '")')->execute();

        $this->connection->prepare('INSERT OR REPLACE INTO uzytkownicy ("id", "login", "haslo")
            VALUES (1, "admin", "admin")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO uzytkownicy ("id", "login", "haslo")
            VALUES (2, "notAdmin", "abc")')->execute();

        $this->connection->prepare('INSERT OR REPLACE INTO komentarze ("id", "id_filmu", "nazwa_uzytkownika", "komentarz", "data_dodania") 
            VALUES(1,1,"Kamil","Bardzo fajny film.", "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO komentarze ("id", "id_filmu", "nazwa_uzytkownika", "komentarz","data_dodania") 
            VALUES(2,1,"Kuba","Podobał mnie się, polecam.", "' . date('Y-m-d H:i:s') . '")')->execute();
        $this->connection->prepare('INSERT OR REPLACE INTO komentarze ("id", "id_filmu", "nazwa_uzytkownika", "komentarz", "data_dodania") 
            VALUES(3,2,"Zenon Wiertara","Dobrze chłopaki robią, dobrze jest, dobrze robią, jest git. Pozdrawiam całą ekipę, niech pozytywny przekaz leci.", "' . date('Y-m-d H:i:s') . '")')->execute();
    }

    public function executeSelectQuery($query, $data = []) {
        $statement = $this->connection->prepare($query);
        $statement->execute($data);
        return $statement->fetchAll();
    }

    public function addMovie($post, $category) {
        $insert = 'INSERT INTO  filmy ("tytul", "opis", "sciezka_do_filmu", "sciezka_do_okladki", "rok_produkcji", "kategoria", "data_dodania")
            VALUES (:tytul, :opis, :sciezka_do_filmu, :sciezka_do_okladki, :rok_produkcji, :kategoria, :data_dodania)';
        $data = [
            "tytul" => $post['tytul'],
            "opis" => $post['opis'],
            "sciezka_do_filmu" => $post['sciezka_do_filmu'],
            "sciezka_do_okladki" => $post['sciezka_do_okladki'],
            "rok_produkcji" => $post['rok'],
            "kategoria" => $post['kategoria'],
            "data_dodania" => date('Y-m-d H:i:s'),
        ];
        $statement = $this->connection->prepare($insert);
        return $statement->execute($data);
    }

    public function addComment($post) {
        $insert = 'INSERT INTO  komentarze ("id_filmu", "nazwa_uzytkownika", "komentarz", "data_dodania")
            VALUES (:id_filmu, :nazwa_uzytkownika, :komentarz, :data_dodania)';
        $data = [
            "id_filmu" => $post['id_filmu'],
            "nazwa_uzytkownika" => $post['nick'],
            "komentarz" => $post['comment'],
            "data_dodania" => date('Y-m-d H:i:s'),
        ];
        $statement = $this->connection->prepare($insert);
        return $statement->execute($data);
    }
}

return new Db();