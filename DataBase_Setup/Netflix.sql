CREATE DATABASE IF NOT EXISTS Netflix;

USE Netflix;

CREATE TABLE genres (
    genreID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE films (
    filmID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title   VARCHAR(1000) NOT NULL,
    trailer VARCHAR(100),
    poster  VARCHAR(250),
    rating  DECIMAL(3,1),
    description VARCHAR(1000) NOT NULL
);

CREATE TABLE films_genres (
    filmID  INT(10) UNSIGNED NOT NULL,
    genreID INT(10) UNSIGNED NOT NULL,
    CONSTRAINT PK_FilmsGenres PRIMARY KEY
    (
        filmID,
        genreID
    ),
    FOREIGN KEY (filmID)  REFERENCES films  (filmID),
    FOREIGN KEY (genreID) REFERENCES genres (genreID)
);

INSERT INTO genres (name) VALUES 
    ("Action & Adventure"),
    ("Anime"),
    ("Children & Family"),
    ("Classic"),
    ("Comedy"),
    ("Romantic Comedy"),
    ("Dark Comedy"),
    ("Drama"),
    ("Horror"),
    ("Independent"),
    ("International"),
    ("Music"),
    ("Romantic"),
    ("Sci-Fi & Fantasy"),
    ("Sports"),
    ("Thriller");
