# VersionHub

**VersionHub** est une application web conçue pour centraliser et moderniser la gestion des packages JavaScript et de leurs auteurs. Cet outil permet de gérer facilement les versions des packages, les auteurs.

## Contexte du projet

L'objectif de **VersionHub** est de résoudre la fragmentation actuelle des systèmes de gestion des packages et des auteurs. En centralisant les informations sur les packages et les contributions des auteurs, l'application facilite le suivi, la mise à jour et la recherche des packages JavaScript et de leurs versions respectives.

---

## Fonctionnalités

- **Gestion des Packages** : Gérer les packages, leurs versions et leurs métadonnées.
- **Gestion des Auteurs** : Suivre les auteurs qui contribuent aux différents packages.

---

## Schéma de la base de données (Modèle de Données)

### 3.1. Entités et Attributs

#### **Package**
- **id (PK)** : Identifiant unique du package.
- **name** : Nom du package (ex. "express").
- **description** : Description détaillée du package.
- **repository_url** : URL du dépôt GitHub ou autre lien vers le dépôt du package.

#### **Version**
- **id (PK)** : Identifiant unique de la version.
- **package_id (FK)** : Identifiant du package auquel la version appartient (clé étrangère vers `Package.id`).
- **version** : Numéro de version du package (ex. "1.0.0", "2.0.0").
- **release_date** : Date de publication de la version (format "YYYY-MM-DD").
- **changelog** : Liste des changements ou améliorations apportées dans cette version (format texte ou JSON).

#### **Author**
- **id (PK)** : Identifiant unique de l’auteur.
- **name** : Nom de l'auteur (ex. "John Doe").
- **email** : Adresse email de l’auteur (ex. "johndoe@example.com").
- **biograph** : Biographie ou description courte de l'auteur.

### 3.2. Relations entre les Entités

#### **Package - Author** (Relation Many-to-Many)
- Un package peut être écrit par plusieurs auteurs, et un auteur peut contribuer à plusieurs packages.
- Cette relation est représentée par une table de jointure `package_author`.

##### **Table de Jointure : package_author**
- **package_id (FK)** : Identifiant du package (clé étrangère vers `Package.id`).
- **author_id (FK)** : Identifiant de l'auteur (clé étrangère vers `Author.id`).

#### **Package - Version** (Relation One-to-Many)
- Un package peut avoir plusieurs versions. La relation entre `Package` et `Version` est de type **one-to-many**.
- Chaque package peut avoir plusieurs versions, mais chaque version appartient à un seul package.

---

## Diagramme de Cas d'Utilisation (UML)

### Acteurs :
- **Utilisateur** : Peut rechercher des packages, voir les détails des packages et des auteurs.
- **Administrateur** : Peut gérer les packages, les auteurs et les versions (ajouter, modifier, supprimer).

### Cas d'utilisation :
- **Recherche de Packages** : Les utilisateurs peuvent rechercher des packages par mots-clés ou auteurs.
- **Gestion des Packages** : Les administrateurs peuvent ajouter, modifier ou supprimer des packages.
- **Gestion des Auteurs** : Les administrateurs peuvent ajouter, modifier ou supprimer des auteurs.
- **Ajout de Versions** : Les administrateurs peuvent ajouter de nouvelles versions à un package.
- **Voir les Détails d’un Package** : Les utilisateurs peuvent voir les informations détaillées sur un package et ses versions.

---

## Configuration de l'Environnement

### Prérequis :
- **Serveur Local** : Installer un serveur local comme Apache ou nginx.
- **Base de données** : MySQL ou MariaDB pour héberger la base de données de l'application.
- **PHP** : Assurez-vous que PHP est installé pour les opérations côté serveur.
- **Éditeur de code** : Utiliser un éditeur de code de votre choix (par exemple, Visual Studio Code).

### Étapes d'installation :

1. **Installer le logiciel requis** :
   - Installez Apache ou nginx pour le serveur local.
   - Assurez-vous que MySQL et PHP sont bien installés et fonctionnels.

2. **Créer la base de données** :
   - Utilisez le script SQL fourni pour créer la base de données et les tables.
   - Exécutez ce script via votre interface MySQL (par exemple, phpMyAdmin).

3. **Structure du projet** :
   - `assets/database/database.sql` : Contient le script SQL pour la création de la base de données et les requêtes.
   - `controllers/` : Contient les scripts PHP pour l'interaction avec la base de données et l'affichage des données.
   - `index.php` : Le point d'entrée principal pour l'application web.

---

## Scripts SQL

Les scripts SQL suivants sont fournis avec le projet :

1. **Création de la base de données et des tables** :
   
```sql
  
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS version_hub_db;
USE version_hub_db;

-- ------------------------------------------------------------------------------------------------------------
--  tables 
-- ------------------------------------------------------------------------------------------------------------

-- Table pour les Auteurs
CREATE TABLE IF NOT EXISTS Author (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL, 
    biograph TEXT 
);

-- Table pour les Packages
CREATE TABLE IF NOT EXISTS Package (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT, 
    repository_url VARCHAR(255) UNIQUE NOT NULL 
);

-- Table pour les Versions
CREATE TABLE IF NOT EXISTS `Version` (
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

```
