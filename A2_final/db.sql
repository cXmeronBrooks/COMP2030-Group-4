SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS Manufacturing22;
CREATE DATABASE Manufacturing22;

USE Manufacturing22;

CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(100) NOT NULL UNIQUE,
    password char(255) NOT NULL,
    address varchar(100) NOT NULL,
    dob DATE NOT NULL,
    userRole varchar(25) NOT NULL,
    phone VARCHAR(15) DEFAULT NULL,
    deleted BOOLEAN NOT NULL DEFAULT 0,
    updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) AUTO_INCREMENT = 1;

CREATE TABLE factory_logs (
    timestamp VARCHAR(50),
    machine_name VARCHAR(255),
    temperature FLOAT,
    pressure FLOAT,
    vibration FLOAT,
    humidity FLOAT,
    power_consumption FLOAT,
    operational_status VARCHAR(50),
    error_code VARCHAR(50),
    production_count INT,
    maintenance_log TEXT,
    speed varchar(10)
);


CREATE TABLE jobs(
    jobID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
)AUTO_INCREMENT =1;

CREATE USER IF NOT EXISTS 'dbadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON Manufacturing22.* TO 'dbadmin'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO jobs(name) VALUES ("Fix the assembly belt");
INSERT INTO jobs(name) VALUES ("Manufacture 100 gears");
INSERT INTO jobs(name) VALUES ("Clean the factory floor");
INSERT INTO jobs(name) VALUES ("Buy 2000kg copper");