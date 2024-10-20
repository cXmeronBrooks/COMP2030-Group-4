SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS Manufacturing;
CREATE DATABASE Manufacturing;

USE Manufacturing;

CREATE TABLE factory_logs (
    timestamp DATETIME,
    machine_name VARCHAR(255),
    temperature DOUBLE,
    pressure DOUBLE,
    vibration DOUBLE,
    humidity DOUBLE,
    power_consumption DOUBLE,
    operational_status VARCHAR(50),
    error_code VARCHAR(50),
    production_count INT,
    maintenance_log TEXT,
    speed DOUBLE
);

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

CREATE USER IF NOT EXISTS 'dbadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON Manufacturing.* TO 'dbadmin'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO StaffLists (name) VALUES ('John Smith');
INSERT INTO StaffLists (name) VALUES ('Jane Doe');
INSERT INTO StaffLists (name) VALUES ('Omar Ali');
INSERT INTO StaffLists (name) VALUES ('Zihan Wang');
INSERT INTO StaffLists (name) VALUES ('Aarav Devi');