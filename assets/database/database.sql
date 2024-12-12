
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

-- ------------------------------------------------------------------------------------------------------------
-- data 
-- ------------------------------------------------------------------------------------------------------------

-- Insertion des Auteurs
INSERT INTO Author (name, email, biograph)
VALUES
    ('Dan Abramov', 'dan.abramov@reactjs.org', 'Co-créateur de React.js et mainteneur principal de Redux.'),
    ('Sashko Stubailo', 'sashko@meteor.com', 'Contributeur majeur à Meteor.js, passionné par l\'innovation web.'),
    ('John Resig', 'john.resig@jquery.com', 'Créateur de jQuery, une bibliothèque JavaScript populaire.'),
    ('Misko Hevery', 'misko@angular.io', 'Créateur d\'AngularJS, l\'un des frameworks JavaScript les plus populaires.'),
    ('Evan You', 'evan@vuejs.org', 'Créateur de Vue.js, un framework JavaScript progressif pour construire des interfaces utilisateur.'),
    ('Addy Osmani', 'addy.osmani@google.com', 'Expert en front-end et auteur de plusieurs livres sur JavaScript et les bonnes pratiques.'),
    ('Brad Frost', 'brad.frost@bradfrost.com', 'Créateur du framework Atomic Design et consultant UX/UI.'),
    ('Ryan Florence', 'ryan.florence@reacttraining.com', 'Co-créateur de React Router et passionné par le développement web.'),
    ('Kent C. Dodds', 'kent@kentcdodds.com', 'Auteur de livres et formations sur React et JavaScript, expert en tests unitaires.'),
    ('Tom Preston-Werner', 'tom@github.com', 'Co-fondateur de GitHub et passionné par l\'innovation dans le développement logiciel.');

-- Insertion des Packages
INSERT INTO Package (name, description, repository_url)
VALUES
    ('React', 'Bibliothèque JavaScript pour construire des interfaces utilisateur', 'https://github.com/facebook/react'),
    ('Vue.js', 'Framework JavaScript progressif pour construire des interfaces utilisateur', 'https://github.com/vuejs/vue'),
    ('jQuery', 'Bibliothèque JavaScript rapide et concise', 'https://github.com/jquery/jquery'),
    ('Angular', 'Framework JavaScript développé par Google', 'https://github.com/angular/angular'),
    ('Lodash', 'Utilitaires JavaScript modernes pour travailler avec des tableaux, des objets, etc.', 'https://github.com/lodash/lodash'),
    ('React Router', 'Bibliothèque pour la gestion du routage dans les applications React', 'https://github.com/ReactTraining/react-router'),
    ('Moment.js', 'Bibliothèque JavaScript pour la gestion des dates et heures', 'https://github.com/moment/moment'),
    ('Axios', 'Bibliothèque de gestion des requêtes HTTP', 'https://github.com/axios/axios'),
    ('D3.js', 'Bibliothèque JavaScript pour la manipulation de données et la création de graphiques', 'https://github.com/d3/d3'),
    ('Babel', 'Transpiler JavaScript pour convertir le code moderne en code compatible avec les navigateurs anciens', 'https://github.com/babel/babel');

-- Insertion des Versions
INSERT INTO `Version` (package_id, `version`, release_date, changelog)
VALUES
    (1, '18.2.0', '2024-11-10', 'Améliorations de performance, nouvelles fonctionnalités dans React Server.'),
    (1, '17.0.2', '2024-08-01', 'Correction de bugs dans le rendu et amélioration des types.'),
    (2, '3.2.6', '2024-10-25', 'Correction de bugs critiques et amélioration de la documentation.'),
    (2, '3.0.0', '2024-05-30', 'Introduction de la composition API et de meilleures performances.'),
    (3, '3.6.0', '2024-07-20', 'Ajout de nouvelles animations et amélioration de la compatibilité avec les navigateurs.'),
    (3, '3.5.1', '2024-03-15', 'Corrections mineures de bugs pour améliorer la stabilité.'),
    (4, '15.2.0', '2024-09-17', 'Amélioration des services HTTP et du routeur Angular.'),
    (4, '14.0.0', '2024-01-10', 'Introduction des directives de premier plan et des mises à jour de TypeScript.'),
    (5, '4.17.21', '2024-11-01', 'Corrections de sécurité et mise à jour de la méthode de gestion des tableaux.'),
    (5, '4.17.20', '2024-05-18', 'Amélioration de la méthode `_.cloneDeep()` et optimisation du code.'),
    (6, '6.0.0', '2024-12-01', 'Nouveau système de gestion des routes, API améliorée.'),
    (7, '2.29.1', '2024-09-13', 'Optimisation des performances et ajout de nouvelles fonctionnalités de parsing de date.'),
    (8, '0.27.0', '2024-10-05', 'Améliorations de la gestion des requêtes HTTP et ajout du support pour `async/await`.'),
    (9, '7.10.0', '2024-11-18', 'Ajout de nouvelles visualisations interactives et support de types de graphiques personnalisés.'),
    (10, '7.0.0', '2024-11-12', 'Refactorisation du système de plugins et ajout de nouveaux transformateurs JavaScript.');

-- Insertion des relations Package-Auteur
INSERT INTO package_author (package_id, author_id)
VALUES
    (1, 1), 
    (2, 5), 
    (3, 3), 
    (4, 4), 
    (5, 2), 
    (6, 1), 
    (7, 2), 
    (8, 6), 
    (9, 7), 
    (10, 8);
