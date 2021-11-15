\T assign6.out;

--Number 1
DROP TABLE Visit;
DROP TABLE Dog;

--Number 2
CREATE TABLE Dog (
	id INTEGER NOT NULL AUTO_INCREMENT,
	breed VARCHAR(15),
	name VARCHAR(25),
	weight DOUBLE,
	PRIMARY KEY (id)
);

--Number 3
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Blue Meral Colli',
		'Rizzo',
		30.4
	);
	
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Tri color Colli',
		'Lexi',
		28.8
	);
	
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Colli',
		'Sadie',
		29.6
	);
	
	
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Bull dog',
		'Zach',
		29.4
	);
	
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Yappy dog',
		'Karen',
		5.4
	);
	
INSERT INTO Dog (breed, name, weight)
	VALUES(
		'Golden Retriever',
		'Josh',
		32.4
	);

--Number 4
DESCRIBE Dog;

--Number 5
SELECT * FROM Dog;

--Number 6
CREATE TABLE Visit (
	id INTEGER NOT NULL AUTO_INCREMENT,
	dog INTEGER,
	dt DATETIME,
	PRIMARY KEY (id),
	FOREIGN KEY (dog) REFERENCES Dog(id)
);

--Number 7
INSERT INTO Visit (dog, dt)
	VALUES(
		1,
		'2019-03-10 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		2,
		'2020-01-16 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		3,
		'2021-11-09 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		4,
		'2021-12-29 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		5,
		'2020-08-24 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		6,
		'2022-06-18 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		1,
		'2020-07-25 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		2,
		'2021-01-02 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		3,
		'2021-08-13 02:55:05'
	);
	
INSERT INTO Visit (dog, dt)
	VALUES(
		4,
		'2021-03-10 02:55:05'
	);

--Number 8
DESCRIBE Visit;

--Number 9
SELECT * FROM Visit;

--Number 10
ALTER TABLE Visit ADD cost DOUBLE;

--Number 11
--Set all costs to 0
UPDATE Visit
	SET cost = 0.0; 
	
UPDATE Visit
	SET cost = 15.62
	WHERE id = 4;
	
UPDATE Visit
	SET cost = 26.98
	WHERE id = 2;
	
UPDATE Visit
	SET cost = 5.65
	WHERE id = 6;
	
UPDATE Visit
	SET cost = 36.92
	WHERE id = 8;
	
--Number 12
SELECT * FROM Visit;

\t;