show databases;
use rachel_market;
CREATE TABLE users(
	id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	reg_date TIMESTAMP
)ENGINE=InnoDB;
CREATE TABLE contacts (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fullname VARCHAR(80) NOT NULL,
	email varchar(50) NOT NULL,
	message TEXT,
	reg_date TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE creations(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description TEXT NOT NULL,
	link VARCHAR(80) NOT NULL,
	image VARCHAR(50) NOT NULL,
	reg_date TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE informations(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	age INT NOT NULL,
	profil VARCHAR(50) NOT NULL,
	telephone VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	presentation TEXT NOT NULL,
	reg_date TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE socialnetworks(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	link VARCHAR(50) NOT NULL,
	informations_id INT,
	reg_date TIMESTAMP,
	CONSTRAINT FOREIGN KEY (informations_id) REFERENCES informations (id)
)ENGINE=InnoDB;

SHOW TABLES;
describe socialnetworks;
drop table socialnetworks;
SHOW ENGINE INNODB STATUS;

use rachel_market;
insert into creations(id, name, description, link, image) values(1,"arici", "Website en Laravel pour une societe d'architecture", "https://github.com/racheelllee", "nombreprueba1.png");
select * from creations;