CREATE TABLE candidates (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  title TEXT,
  img VARCHAR(255),
  nomination1 INT DEFAULT 0,
  nomination2 INT DEFAULT 0,
  nomination3 INT DEFAULT 0,
  PRIMARY KEY (id)
);
INSERT INTO candidates (
  name,
  title,
  img
) 
VALUES (
  'John Lennon',
  'vocals, guitar, keyboards, harmonica (1960–1969)',
  'johnlennon.png'
);
INSERT INTO candidates (
  name,
  title,
  img
) 
VALUES (
  'Paul McCartney',
  'vocals, bass guitar, guitar, keyboards, drums (1960–1970)',
  'paulmccartney.jpg'
);
INSERT INTO candidates (
  name,
  title,
  img
) 
VALUES (
  'George Harrison',
  'guitar, vocals, sitar (1960–1970)',
  'georgeharrison.jpg'
);
INSERT INTO candidates (
  name,
  title,
  img
) 
VALUES (
  'Ringo Starr',
  'drums, percussion, vocals (1962–1970)',
  'ringostarr.jpg'
);
INSERT INTO candidates (
  name,
  title,
  img
) 
VALUES (
  'Stuart Sutcliffe',
  'bass guitar, vocals (1960–1961)',
  'stuartsutcliffe.jpg'
);
