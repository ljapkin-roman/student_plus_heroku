CREATE TYPE sex AS ENUM ('male', 'female');
CREATE TYPE place_living AS ENUM('local', 'no local');
CREATE table Students (
    id SERIAL  PRIMARY KEY,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    number_group varchar(5) not null,
    email varchar(255) not null UNIQUE ,
    gender sex not null,
    score_ege int not null
    CHECK (score_ege BETWEEN 30 and 400),
    birthday  DATE  not null CHECK (birthday > '1910-01-01'),
    citizen place_living not null,
    cookie_user varchar(255) not null UNIQUE
);