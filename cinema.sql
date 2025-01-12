-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 12 jan. 2025 à 15:23
-- Version du serveur : 5.7.44
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `ACTOR`
--

CREATE TABLE `ACTOR` (
  `id_actor` int(11) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ACTOR`
--

INSERT INTO `ACTOR` (`id_actor`, `id_person`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 26),
(25, 31);

-- --------------------------------------------------------

--
-- Structure de la table `CASTING`
--

CREATE TABLE `CASTING` (
  `id_movie` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `CASTING`
--

INSERT INTO `CASTING` (`id_movie`, `id_role`, `id_actor`) VALUES
(1, 15, 1),
(1, 16, 16),
(2, 3, 3),
(3, 37, 2),
(4, 5, 5),
(6, 35, 2),
(9, 34, 8),
(19, 36, 1);

-- --------------------------------------------------------

--
-- Structure de la table `DIRECTOR`
--

CREATE TABLE `DIRECTOR` (
  `id_director` int(11) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `DIRECTOR`
--

INSERT INTO `DIRECTOR` (`id_director`, `id_person`) VALUES
(1, 21),
(2, 22),
(3, 23),
(4, 24),
(5, 25),
(8, 33);

-- --------------------------------------------------------

--
-- Structure de la table `MOVIE`
--

CREATE TABLE `MOVIE` (
  `id_movie` int(11) NOT NULL,
  `movie_title` varchar(200) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `synopsis` text NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `poster` varchar(255) NOT NULL,
  `id_director` int(11) DEFAULT NULL,
  `releaseYear` int(11) DEFAULT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `MOVIE`
--

INSERT INTO `MOVIE` (`id_movie`, `movie_title`, `duration`, `synopsis`, `rating`, `poster`, `id_director`, `releaseYear`, `id_type`, `cover`) VALUES
(1, 'The Matrix', 136, 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 5, 'public/img/posters/matrix.jpg', 1, NULL, NULL, 'public/img/covers/the-matrix-digital-rain.jpg'),
(2, 'Inception', 148, 'A thief who enters the dreams of others to steal secrets from their subconscious is given the task of planting an idea into the mind of a CEO.', 5, 'public/img/posters/inception.jpg', 1, NULL, NULL, 'public/img/covers/inception-cover.jpg'),
(3, 'Titanic', 195, 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 4, 'public/img/posters/titanic.webp', 2, NULL, NULL, 'public/img/covers/titanic-wallpaper.jpg'),
(4, 'Avengers: Endgame', 181, 'After the devastating events of Avengers: Infinity War, the Avengers assemble once more in order to reverse Thanos\' actions and restore order to the universe.', 5, 'public/img/posters/avengers.jpg', 3, NULL, NULL, 'public/img/covers/avengers-cover.jpg'),
(5, 'Harry Potter and the Sorcerer\'s Stone', 152, 'An orphaned boy discovers that he is a wizard and attends a magical school to learn the skills necessary to defeat the dark wizard responsible for his parents\' deaths.', 5, 'public/img/posters/harryPotter.jpg', 2, NULL, NULL, NULL),
(6, 'Star Wars: The Empire Strikes Back', 124, 'After the Rebels are overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda while his friends are pursued across the galaxy by Darth Vader.', 3, 'https://goldenglobes.com/wp-content/uploads/2023/10/star_wars-_episode_v_-_the_empire_strikes_back.jpg?w=600', 4, NULL, NULL, NULL),
(7, 'The Godfather', 175, 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 5, 'public/img/posters/theGodFather.jpg', 2, NULL, NULL, NULL),
(8, 'Pulp Fiction', 154, 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 5, 'public/img/posters/pulpFiction.jpg', 3, NULL, NULL, NULL),
(9, 'Forrest Gump', 142, 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an extraordinary life story.', 1, 'public/img/posters/forrestGump.webp', 3, NULL, NULL, NULL),
(10, 'The Dark Knight', 152, 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, forcing Batman to rethink his methods.', 5, 'public/img/posters/theDarkKnight.jpg', 1, NULL, NULL, NULL),
(11, 'The Avengers', 143, 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 5, 'public/img/posters/avengers.jpg', 3, NULL, NULL, NULL),
(12, 'Jurassic Park', 127, 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run wild.', 2, 'public/img/posters/jurassicPark.webp', 2, NULL, NULL, NULL),
(18, 'Gladiator', 155, 'Gladiator (2000), directed by Ridley Scott, is an epic historical drama set in ancient Rome. The story follows Maximus Decimus Meridius (Russell Crowe), a respected general in the Roman army, who is betrayed by Commodus (Joaquin Phoenix), the power-hungry son of Emperor Marcus Aurelius. After his family is murdered and he is sold into slavery, Maximus becomes a gladiator in the brutal Roman arena. Driven by a thirst for vengeance, he rises through the ranks of the gladiatorial games, eventually catching the attention of the masses and the emperor. As he seeks to avenge his family&#39;s death, Maximus faces the moral dilemma of challenging the corrupt Commodus, who is determined to maintain his reign at any cost. The film explores themes of honor, revenge, and the quest for justice. It culminates in an intense showdown between Maximus and Commodus in the Colosseum, where Maximus sacrifices his life for the greater good of Rome. The film&#39;s combination of powerful performances, stunning visuals, and a gripping storyline earned it critical acclaim, including five Academy Awards, with Crowe winning Best Actor for his portrayal of the legendary hero.', 4, 'public/img/posters/gladiator.webp', 5, 2000, NULL, NULL),
(19, 'Matrix Reloaded', 138, 'Les hommes sauvés de la Matrice sont réfugiés dans la cité souterraine de Zion, que des machines de destruction tentent d&#39;atteindre. Morpheus et Neo attendent un signe de l&#39;Oracle pour continuer leur combat. Lorsque, enfin, il se manifeste, Neo comprend qu&#39;une erreur de programmation de la Matrice a engendré l&#39;Oracle. Il se met ensuite en route pour sa nouvelle mission : retrouver le Maître des clés, qui est prisonnier du Mérovingien.', 5, 'public/img/posters/678185fbc4c868.23488893.webp', 1, 2003, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `movie_type`
--

CREATE TABLE `movie_type` (
  `id_movie` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `movie_type`
--

INSERT INTO `movie_type` (`id_movie`, `id_type`) VALUES
(1, 6),
(1, 5),
(2, 1),
(2, 6),
(3, 4),
(3, 3),
(4, 1),
(4, 3),
(5, 3),
(5, 4),
(6, 1),
(6, 6),
(7, 3),
(8, 1),
(8, 3),
(9, 3),
(9, 4),
(10, 1),
(11, 3),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `PERSON`
--

CREATE TABLE `PERSON` (
  `id_person` int(11) NOT NULL,
  `person_lastname` varchar(50) NOT NULL,
  `person_firstname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `portrait` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `PERSON`
--

INSERT INTO `PERSON` (`id_person`, `person_lastname`, `person_firstname`, `gender`, `dateOfBirth`, `portrait`) VALUES
(1, ' Reeves', 'Keanu', 'male', '1964-09-02', 'https://resize-elle.ladmedia.fr/r/300,,forcex/crop/300,386,center-middle,forcex,ffffff/img/var/plain_site/storage/images/personnalites/keanu-reeves/12541462-3-fre-FR/Keanu-Reeves.jpg'),
(2, ' Jolie', 'Angelina', 'female', '1975-06-04', NULL),
(3, ' Downey Jr.', 'Robert', 'male', '1965-04-04', NULL),
(4, ' Johansson', 'Scarlett', 'female', '1984-11-22', NULL),
(5, 'Craig', 'Daniel', 'male', '1968-03-02', NULL),
(6, ' Cumberbatch', 'Benedict', 'female', '1976-07-19', NULL),
(7, 'Witherspoon', 'Reese ', 'male', '1976-03-22', NULL),
(8, ' Hanks', 'Tom', 'male', '1956-07-09', NULL),
(9, 'Radcliffe', 'Daniel ', 'male', '1989-07-23', NULL),
(10, 'Watson', 'Emma ', 'female', '1990-04-15', NULL),
(11, ' Maguire', 'Tobey', 'male', '1975-06-27', NULL),
(12, 'Dunst', 'Kirsten ', 'female', '1982-04-30', NULL),
(13, ' DiCaprio', 'Leonardo', 'male', '1974-11-11', NULL),
(14, ' Winslet', 'Kate', 'female', '1975-10-05', NULL),
(16, ' Moss', 'Carrie-Anne', 'female', '1967-10-21', NULL),
(17, 'Ford', 'Harrison ', 'male', '1942-07-13', NULL),
(18, 'Fisher', 'Carrie ', 'male', '1956-10-21', NULL),
(19, ' McKellen', 'Ian', 'male', '1939-05-25', NULL),
(20, ' Wood', 'Elijah', 'male', '1981-01-28', NULL),
(21, ' Nolan', 'Christopher', 'male', '1970-07-30', 'https://media.wired.com/photos/648762356279e36472844580/master/w_1920,c_limit/WI070123_FF_ChristopherNolan_01.jpg'),
(22, 'Spielberg', 'Steven ', 'male', '1946-12-18', 'https://californiamuseum.org/wp-content/uploads/cahalloffame_inductee_stevenspielberg_1800x2560-1.png'),
(23, ' Tarantino', 'Quentin', 'male', '1963-03-27', 'https://media.vanityfair.fr/photos/60d3449e5ed96cee498c8c15/1:1/w_630,h_630,c_limit/quentin_tarantino_7624.jpeg'),
(24, 'Abrams', 'J.J. ', 'male', '1966-06-27', 'https://www.babelio.com/users/AVT_JJ-Abrams_9880.jpeg'),
(25, 'Ross', 'Gary', 'male', '1956-11-03', 'https://deadline.com/wp-content/uploads/2023/11/Gary-Ross.jpg'),
(26, 'Deep', 'Johny', 'Male', '1967-12-04', 'https://media.vanityfair.fr/photos/62f3ab086d7c7c8358098ec3/16:9/w_2560%2Cc_limit/Depp.jpg'),
(31, 'test', 'test', 'male', '2001-01-01', 'public/img/persons/default.jpg'),
(33, 'TEST', 'TEST', 'male', '2001-01-01', 'public/img/persons/default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ROLE`
--

CREATE TABLE `ROLE` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ROLE`
--

INSERT INTO `ROLE` (`id_role`, `role_name`) VALUES
(1, 'John Wick'),
(2, 'Lara Croft'),
(3, 'Tony Stark'),
(4, 'Natasha Romanoff'),
(5, 'James Bond'),
(6, 'Sherlock Holmes'),
(7, 'Elle Woods'),
(8, 'Forrest Gump'),
(9, 'Harry Potter'),
(10, 'Hermione Granger'),
(11, 'Peter Parker'),
(12, 'Mary Jane Watson'),
(13, 'Jack Dawson'),
(14, 'Rose DeWitt Bukater'),
(15, 'Neo'),
(16, 'Trinity'),
(17, 'Han Solo'),
(18, 'Princess Leia'),
(19, 'Gandalf'),
(20, 'Frodo Baggins'),
(34, 'Forrest Gump'),
(35, 'jjj'),
(36, 'Neo'),
(37, 'blabla');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE`
--

CREATE TABLE `TYPE` (
  `id_type` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `TYPE`
--

INSERT INTO `TYPE` (`id_type`, `type_name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Romance'),
(5, 'Thriller'),
(6, 'Sci-Fi'),
(8, 'Whatever');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ACTOR`
--
ALTER TABLE `ACTOR`
  ADD PRIMARY KEY (`id_actor`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `CASTING`
--
ALTER TABLE `CASTING`
  ADD KEY `id_movie_2` (`id_movie`,`id_role`,`id_actor`),
  ADD KEY `id_actor` (`id_actor`),
  ADD KEY `casting_ibfk_3` (`id_role`);

--
-- Index pour la table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `MOVIE`
--
ALTER TABLE `MOVIE`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `id_director` (`id_director`);

--
-- Index pour la table `movie_type`
--
ALTER TABLE `movie_type`
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Index pour la table `PERSON`
--
ALTER TABLE `PERSON`
  ADD PRIMARY KEY (`id_person`);

--
-- Index pour la table `ROLE`
--
ALTER TABLE `ROLE`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `TYPE`
--
ALTER TABLE `TYPE`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ACTOR`
--
ALTER TABLE `ACTOR`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `MOVIE`
--
ALTER TABLE `MOVIE`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `PERSON`
--
ALTER TABLE `PERSON`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `ROLE`
--
ALTER TABLE `ROLE`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `TYPE`
--
ALTER TABLE `TYPE`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ACTOR`
--
ALTER TABLE `ACTOR`
  ADD CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `PERSON` (`id_person`) ON DELETE CASCADE;

--
-- Contraintes pour la table `CASTING`
--
ALTER TABLE `CASTING`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `ACTOR` (`id_actor`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `MOVIE` (`id_movie`),
  ADD CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `ROLE` (`id_role`) ON DELETE CASCADE;

--
-- Contraintes pour la table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `PERSON` (`id_person`) ON DELETE CASCADE;

--
-- Contraintes pour la table `movie_type`
--
ALTER TABLE `movie_type`
  ADD CONSTRAINT `movie_type_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `TYPE` (`id_type`) ON DELETE NO ACTION,
  ADD CONSTRAINT `movie_type_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `MOVIE` (`id_movie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
