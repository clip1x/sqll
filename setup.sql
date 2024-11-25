-- Créer la base de données
CREATE DATABASE test_db;

-- Créer la table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insérer un utilisateur de test (Admin par exemple)
INSERT INTO users (username, password) VALUES ('Admin', 'Admin');  -- Attention, mot de passe en clair !

-- Créer la table des messages
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL
);