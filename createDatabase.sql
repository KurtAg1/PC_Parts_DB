-- Create DB
CREATE DATABASE PartsDB;
USE PartsDB;
CREATE TABLE Item (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(200),
  categoryId INT(11) NOT NULL,
  statusId INT(11) NOT NULL,
  locationId INT(11) NOT NULL
);
CREATE TABLE Category(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(50) NOT NULL
);
CREATE TABLE Status(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  status VARCHAR(50) NOT NULL
);
CREATE TABLE Location(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  location VARCHAR(50) NOT NULL
);
-- Insert Test Data
INSERT INTO Category(category)
VALUES('CPU'),
  ('GPU');
INSERT INTO Status(status)
VALUES('In Use'),
  ('Not Tested');
INSERT INTO Location(location)
VALUES('Main PC'),
  ('Server PC');
INSERT INTO Item(name, categoryId, statusId, locationId)
VALUES('Intel i7-4770', '1', '1', '2'),
  ('AMD Ryzen 5 3600', '1', '1', '1');
-- Admin User
CREATE TABLE admin(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(11) NOT NULL,
  password VARCHAR(200) NOT NULL
);
INSERT INTO admin(username, password)
VALUES(
    'admin',
    '$2y$10$MFEDDAwDNc/zyADZ0i23OuMNxK8VPU/It6qoHBCprd759T0Ac5py.'
  );
-- Retreive Data
SELECT Item.id,
  Item.name,
  Item.description,
  Category.category,
  Status.status,
  Location.location
FROM Item
  JOIN Category ON Item.categoryId = Category.id
  JOIN Status ON Item.statusId = Status.id
  JOIN Location ON Item.locationId = Location.id;