CREATE DATABASE IF NOT EXISTS escapegame CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE escapegame;

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    reponse_attendu VARCHAR(255) NOT NULL,
    message_de_succes VARCHAR(255) NOT NULL,
    message_erreur VARCHAR(255) NOT NULL,
    nb_tentative INT NOT NULL DEFAULT 0,
    nb_reussite INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
