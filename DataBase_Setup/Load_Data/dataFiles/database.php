<?php
/**
 * @author Maryam Mazadi, Matthew Uhlar, Nicolas Carson and Sigrunn Sky
 * @version 1.0
 */
 
class Database {

    static protected $connection = NULL;

    # GenreID of current file
    private $fileGenreID = '';
    private $errorLog    = 'dataErrors.txt';

    # Queries database, returns associative array if results are found
    private function mysqlQuery($query) {
        $connection = $this->connect();
        $result     = mysqli_query($connection, $query) or die (mysqli_error($connection));

        if ($result->num_rows > 0)
            return $result->fetch_assoc();

        return false;
    }

    # set genreID for current file
    private function setFileGenreID($genre) {
        $connection = $this->connect();
        $query   = "SELECT genreID FROM genres WHERE name = '$genre'";
        $result  = $this->mysqlQuery($query);
        $genreID = $result['genreID'];

        $this->fileGenreID = $genreID;
    }
    
    # Get genreID of a specific title
    private function getGenreID($title) {
        $connection  = $this->connect();
        $filmID      = $this->getFilmID($title);
        $query       = "SELECT genreID FROM films_genres WHERE filmID = '$filmID'";

        $result  = $this->mysqlQuery($query);
        $genreID = $result['genreID'];

        return $genreID;
    }

    # Returns filmID for specified title
    private function getFilmID($title) {
        $connection = $this->connect();
        $query      = "SELECT filmID FROM films WHERE title = '$title'";
        $result     = $this->mysqlQuery($query);
        $filmID     = $result['filmID'];

        return $filmID;
    }

    private function sameTitleGenre($title) {
        $connection  = $this->connect();
        $filmID      = $this->getFilmID($title);
        $fileGenreID = $this->fileGenreID;
        $query       = "SELECT genreID FROM films_genres WHERE filmID = '$filmID'";

        $result     = mysqli_query($connection, $query) or die (mysqli_error($connection));
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $ID) {
                    if ($ID == $fileGenreID)
                        return true;
                }
            }
        }
        return false;
    }

    # Checks if film is already stored in database
    private function filmInDatabase($title) {
        $connection = $this->connect();
        $query      = "SELECT title FROM films WHERE title = '$title'";
        $result     = $this->mysqlQuery($query);

        if ($result === false)
            return false;

        return true;
    }

    # Insert film information into films table
    private function insertFilmsTable($title, $trailer, $poster, $rating, $description) {
        $connection = $this->connect();

        $query = "INSERT INTO films (title, trailer, poster, rating, description) 
                  VALUES ('$title', '$trailer', '$poster', '$rating', '$description')";

        $this->mysqlQuery($query);
    }

    # Insert filmID and genreID into films_genre junction table
    private function insertFilmsGenresTable($title) {
        $connection = $this->connect();
        $genreID    = $this->fileGenreID;
        $filmID     = $this->getFilmID($title);

        $query = "INSERT INTO films_genres (filmID, genreID)
                  SELECT '$filmID', '$genreID' FROM genres
                  WHERE genreID = '$genreID'";

        $this->mysqlQuery($query);
    }

    # Establish connection to database
    public function connect() {
        # Enter database information to establish connection
        $host  = 'localhost';
        $user  = 'root';
        $db    = 'Netflix';
        $pswrd = '';

        $conn  = mysqli_connect($host, $user, $pswrd, $db) or die(mysql_error());

        return $conn;
    }

    # Genre used to fetch genreID 
    public function setGenre($genre) {
        $this->setFileGenreID($genre);
    }

    private function writeToErrorLog($title) {
        $file = $this->errorLog;
        $current = file_get_contents($file);
        $current .= $title . "\n";
        file_put_contents($file, $current);
    }


    public function addFilm($title, $trailer, $poster, $rating, $description) {
        $filmInDatabase = $this->filmInDatabase($title);        

        # If film is already stored in database, add new genre to films_genre table
        if ($filmInDatabase == false) {
            $this->insertFilmsTable($title, $trailer, $poster, $rating, $description);
            $this->insertFilmsGenresTable($title);
        } else {
            # Possible for multiple films belonging to the same genre to have identical titles (remakes/coincedences)
            # If this is the case, film is added to an error log to manually fix until solution is found
            $sameTitleAndGenre = $this->sameTitleGenre($title);
            if ($sameTitleAndGenre == true)
                $this->writeToErrorLog($title);
            else 
                $this->insertFilmsGenresTable($title);
        }
    }
}
?>
