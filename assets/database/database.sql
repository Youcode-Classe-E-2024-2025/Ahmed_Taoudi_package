-- Création de la base de données
CREATE DATABASE IF NOT EXISTS version_hub_db;
USE version_hub_db;

-- Table pour les Auteurs
CREATE TABLE IF NOT EXISTS Author (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL, 
    biography TEXT 
);

-- Table pour les Packages
CREATE TABLE IF NOT EXISTS Package (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT, 
    repository_url VARCHAR(255) 
);

-- Table pour les Versions
CREATE TABLE IF NOT EXISTS `version` (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    package_id INT NOT NULL, 
    `version` VARCHAR(50) NOT NULL, 
    release_date DATE, 
    changelog TEXT,
    FOREIGN KEY (package_id) REFERENCES Package(id) ON DELETE CASCADE
);

-- Table de jointure entre Packages et Authors (relation many-to-many)
CREATE TABLE IF NOT EXISTS package_author (
    package_id INT NOT NULL, 
    author_id INT NOT NULL,
    PRIMARY KEY (package_id, author_id),  
    FOREIGN KEY (package_id) REFERENCES Package(id) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES Author(id) ON DELETE CASCADE
);
