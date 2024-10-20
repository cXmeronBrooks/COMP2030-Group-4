SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS Manufacturing;
CREATE DATABASE Manufacturing;

USE Manufacturing;

CREATE TABLE StaffLists(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(15) DEFAULT NULL,
    address VARCHAR(100) DEFAULT 'Not Provided',
    role VARCHAR(100) NOT NULL DEFAULT 'Waiting',
    completed BOOLEAN NOT NULL DEFAULT 0,
    updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
             ON UPDATE CURRENT_TIMESTAMP
) AUTO_INCREMENT = 1;

CREATE TABLE users(
    userID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(100),
    hashPass VARCHAR(100)
) AUTO_INCREMENT=1;

CREATE TABLE jobs(
    jobID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
)AUTO_INCREMENT =1;

CREATE USER IF NOT EXISTS 'dbadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON Manufacturing.* TO 'dbadmin'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO StaffLists (name) VALUES ('John Smith');
INSERT INTO StaffLists (name) VALUES ('Jane Doe');
INSERT INTO StaffLists (name) VALUES ('Omar Ali');
INSERT INTO StaffLists (name) VALUES ('Zihan Wang');
INSERT INTO StaffLists (name) VALUES ('Aarav Devi');

INSERT INTO users (UserName, hashPass) VALUES ('manager', 'apple');
INSERT INTO users(UserName, hashPass) VALUES ('worker', 'ilikemoney');

INSERT INTO jobs(name) VALUES ("Fix the assembly belt");
INSERT INTO jobs(name) VALUES ("Manufacture 100 gears");
INSERT INTO jobs(name) VALUES ("Clean the factory floor");
INSERT INTO jobs(name) VALUES ("Buy 2000kg copper");
