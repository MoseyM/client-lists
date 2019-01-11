-- Create the database
DROP DATABASE IF EXISTS clientele;
CREATE DATABASE clientele;
USE clientele;

-- Create the User
DROP USER IF EXISTS 'admin'@'localhost';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password';

-- Grant Privileges to User
GRANT ALL PRIVILEGES ON clientele.* TO 'admin'@'localhost';

-- Create tables
CREATE TABLE users
	(
		id INT NOT NULL AUTO_INCREMENT,
		username CHAR(30) NOT NULL,
		password VARCHAR(255) NOT NULL,
		PRIMARY KEY(id)
	);

CREATE TABLE clients
	(
		id INT NOT NULL AUTO_INCREMENT,
		firstname VARCHAR(255) NOT NULL,
		lastname VARCHAR(255) NOT NULL,
		company VARCHAR(255) NOT NULL,		
		phone CHAR(15),
		email VARCHAR(255),
		PRIMARY KEY(id)
	);
