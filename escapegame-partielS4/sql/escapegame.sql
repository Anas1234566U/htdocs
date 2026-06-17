CREATE DATABASE IF NOT EXISTS escapegame CHARACTER SET utf8mb4;

USE escapegame;

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `reponse_attendu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message_de_succes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message_erreur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nb_tentative` int NOT NULL DEFAULT '0',
  `nb_reussite` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `questions` (`id`, `question`, `reponse_attendu`, `message_de_succes`, `message_erreur`, `nb_tentative`, `nb_reussite`) VALUES
(1, 'Quelle est la capitale de la France ?', 'Paris', 'Bravo c\'est la bonne réponse !!!', 'Bah non lol', 2, 1),
(3, 'Couleur des chaise de la NWS ?', 'Bleu', 'Good', 'Non va voir', 3, 1),
(4, 'Quel est le nom de l\'actuel président français ? ', 'Macron', 'Yess', 'non non', 1, 1);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
