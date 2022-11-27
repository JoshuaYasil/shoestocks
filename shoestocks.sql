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

-- Create Table Suppliers

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_position` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)

-- Dumping data on 'suppliers' table

INSERT INTO suppliers (id, firstname, lastname, email, company_position, company_name, company_address, status, created_at, updated_at) VALUES
(1, 'Joshua', 'Yasil', 'jy@wmsu.edu.ph', 'Manager', 'BBCtech', 'Normal Road', 'Inactive', '2022-11-13 14:42:27', '2022-11-13 14:43:36'),
(1, 'Flor', 'Macasaet', 'fm@wmsu.edu.ph', 'Manager', 'BBCtech', 'Normal Road', 'Inactive', '2022-11-13 14:42:27', '2022-11-13 14:43:36'),

