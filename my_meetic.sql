DROP DATABASE IF EXISTS meetic;
CREATE DATABASE meetic;

USE meetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS hobbies;
CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    email           VARCHAR(255)    NOT NULL UNIQUE,
    firstname       VARCHAR(255)    NOT NULL,
    lastname        VARCHAR(255)    NOT NULL,
    gender        VARCHAR(255)    NOT NULL,
    birthdate       DATE        NOT NULL,
    passwordhash VARCHAR(255) NOT NULL,
    city         VARCHAR(255) NOT NULL,
    hobby     VARCHAR(255)    NOT NULL,
    orientation VARCHAR(255) NOT NULL,
    is_active BOOLEAN,
    PRIMARY KEY (id)
);

/* CREATE TABLE hobbies (
    id              INT             NOT NULL AUTO_INCREMENT,
    id_user        INT    NOT NULL,
    hobby     VARCHAR(255)    NOT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id),
    PRIMARY KEY (id)
);
 */
/* CREATE TABLE movie_genre (
    id_movie        INT             NOT NULL,
    id_genre        INT             NOT NULL,
    FOREIGN KEY (id_movie) REFERENCES movie(id),
    FOREIGN KEY (id_genre) REFERENCES genre(id)
); */