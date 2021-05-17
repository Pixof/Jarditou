DROP DATABASE IF EXISTS jarditouBase;

CREATE DATABASE jarditouBase;

USE jarditouBase;

CREATE TABLE `role` (
	id      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name`  VARCHAR(8) NOT NULL
);

CREATE TABLE user (
  id                   INT NOT NULL AUTO_INCREMENT,
  firstname            varchar(50) NOT NULL,
  lastname             varchar(50) NOT NULL,
  dateOfBirthday       date NOT NULL,
  email                varchar(50) NOT NULL UNIQUE,
  `password`           varchar(255) NOT NULL,
  dateOfInscription    date NOT NULL,
  role_id              int(2) NOT NULL,
	FOREIGN KEY (role_id ) REFERENCES `role`(id),
	PRIMARY KEY (id)
);

-- Création des role :
INSERT INTO `role` (`name`) VALUES ('user');
INSERT INTO `role` (`name`) VALUES ('admin');

INSERT INTO   user (firstname, lastname, dateOfBirthday, email, `password`, dateOfInscription, role_id) 
       VALUES    ('Premier', 'Client', '1989/03/12', 'client@gmail.com', '$2y$10$8Fbn4QJg4f.d5mQ5fZLR9eBAapxqYGZ9ReOAadZmjJc7nLvM4LTua', NOW(), 2 );

-- mdp : aaa