CREATE TYPE sex AS ENUM ('male', 'female');
CREATE TYPE place_living AS ENUM('local', 'no local');
CREATE table Students (
    id SERIAL  PRIMARY KEY,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    number_group varchar(255) not null,
    email varchar(255),
    gender sex,
    score_ege int,
    CHECK (score_ege BETWEEN 30 and 400),
    birthday DATE,
    citizen place_living

);