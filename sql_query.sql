-- create a table
CREATE TABLE mallow_technologies (
 id INTEGER  AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(20) NOT NULL,
 gender VARCHAR(7) NOT NULL,
 team VARCHAR(5) NOT NULL
);

-- insert some values
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Jaya Prakash','Male','PHP');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Gomathi Shruthy','Female','PHP');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Surya', 'Male','RoR');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Ram', 'Male','RoR');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Nawaz','Male','PHP');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Sharanya','Female','HR');
INSERT INTO mallow_technologies (name,gender,team) VALUES ('Kumar','Male','REACT');
SELECT * FROM mallow_technologies ;


-- Update any one record
UPDATE mallow_technologies SET team='REACT' WHERE id > 2 AND name = "Surya";
SELECT * FROM mallow_technologies ;


-- Delete any one record
DELETE FROM mallow_technologies WHERE team ='RoR';
SELECT * FROM mallow_technologies ;

-- Fetching latest data and using offset & limit
SELECT * FROM mallow_technologies ORDER BY id DESC LIMIT 1;
SELECT * FROM mallow_technologies LIMIT 3 OFFSET 1;

