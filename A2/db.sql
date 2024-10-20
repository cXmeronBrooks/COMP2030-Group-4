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


CREATE USER IF NOT EXISTS 'dbadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON Manufacturing.* TO 'dbadmin'@'localhost';
FLUSH PRIVILEGES;

