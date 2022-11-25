SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `shoestocks`
CREATE DATABASE 'shoestocks';
USE 'shoestocks';

-- Table structure for 'account'

CREATE TABLE 'account'(
	'user_id' integer PRIMARY key AUTO_INCREMENT,
    'firstname' VARCHAR(255),
    'lastname' VARCHAR(255),
    'type' VARCHAR(255),
    'username' VARCHAR(255),
    'user_password' VARCHAR(255)
);

-- Dumping data on 'account' table

INSERT INTO account (firstname, lastname, type, username, user_password) VALUES ('Joshua', 'Yasil', 'admin', 'josh', 'josh');
INSERT INTO account (firstname, lastname, type, username, user_password) VALUES ('Emil', 'Magcanta', 'admin', 'emil', 'emil');
INSERT INTO account (firstname, lastname, type, username, user_password) VALUES ('Milo', 'Yasil', 'staff', 'milo', 'milo');
INSERT INTO account (firstname, lastname, type, username, user_password) VALUES ('Oreo', 'Yasil', 'staff', 'oreo', 'oreo');
INSERT INTO account (firstname, lastname, type, username, user_password) VALUES ('Kilo', 'Yasil', 'staff', 'kilo', 'kilo');

