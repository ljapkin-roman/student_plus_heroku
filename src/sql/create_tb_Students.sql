CREATE TYPE sex AS ENUM ('male', 'female');
CREATE table Students (
    id SERIAL  PRIMARY KEY,
    firstname varchar(255) not null,
    lastname varchar(255) not null,
    email varchar(255),
    gender sex,
    score_ege int,
    CHECK (score_ege BETWEEN 30 and 400)
);