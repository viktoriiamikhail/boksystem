-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 18 jan 2024 kl 13:44
-- Serverversion: 10.4.22-MariaDB
-- PHP-version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `2023_boksystem`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `table_age`
--

CREATE TABLE `table_age` (
  `age_id` int(11) NOT NULL,
  `age_interval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_age`
--

INSERT INTO `table_age` (`age_id`, `age_interval`) VALUES
(1, '5-12'),
(2, '12-18'),
(4, '25-35'),
(5, '18+'),
(6, '3-6');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_author`
--

CREATE TABLE `table_author` (
  `author_id` int(11) NOT NULL,
  `author_firstname` varchar(50) NOT NULL,
  `author_lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_author`
--

INSERT INTO `table_author` (`author_id`, `author_firstname`, `author_lastname`) VALUES
(1, 'Tove', 'Jansson'),
(12, 'Jenni/Ulrika', 'Lundgren'),
(13, 'Katarina', 'Kuick'),
(14, 'Nora', 'Roberts'),
(21, 'sss', 'sss');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_books`
--

CREATE TABLE `table_books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_description` text NOT NULL,
  `author_fk` int(11) NOT NULL,
  `illustrator_fk` int(11) NOT NULL,
  `category_fk` int(11) NOT NULL,
  `genre_fk` int(11) NOT NULL,
  `series_fk` int(11) NOT NULL,
  `language_fk` int(11) NOT NULL,
  `book_year` year(4) NOT NULL,
  `publisher_fk` int(11) NOT NULL,
  `age_fk` int(11) NOT NULL,
  `book_page` varchar(50) NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `book_picture` varchar(50) NOT NULL,
  `bookstatus_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `creator_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_books`
--

INSERT INTO `table_books` (`book_id`, `book_title`, `book_description`, `author_fk`, `illustrator_fk`, `category_fk`, `genre_fk`, `series_fk`, `language_fk`, `book_year`, `publisher_fk`, `age_fk`, `book_page`, `book_price`, `book_picture`, `bookstatus_fk`, `user_fk`, `creator_fk`) VALUES
(12, ' Trollkarlens hatt', 'Den här berättelsen börjar med trolldom en tidig vårmorgon och slutar en varm augustinatt som aldrig kommer att glömmas i Mumindalen. Däremellan ligger Mumintrollets långa sommar, full av solsken och åskväder. Den kunde ha varit som en vanlig sommar med upptäckter av nya öar, med långrevsfiske i duggregn och lyckliga bad i bränningarna. Men så hittade muminfamiljen Trollkarlens hatt. Och efter det var ingenting som vanligt längre.\r\n\r\nFarlighet och spänning hade kommit in i dalen och tassade hotfullt kring deras hus. Varje dag hände otroliga och upprörande saker - de hade med andra ord aldrig haft så roligt förr!\r\n\r\nDet här är historien om små och stora kryp och om glada händelser och hemska händelser som alltid måste vara hopblandade för att ens sommar ska bli riktig och underbar.', 1, 1, 1, 1, 1, 2, 2014, 1, 1, '153', '20,50€', 'trollkarlens-hatt.jpg', 1, 7, 12),
(13, 'The Summer Book', 'Celebrating 50 years of Tove Jansson\'s classic, bestselling novel Featured in the BBC 2 Between the Covers Bookclub Special (Eurovision series 2023) \'Distils the essence of summer\' Robert Macfarlane \'Magical, life-affirming\' Elizabeth Gilbert The Worldwide Classic about a tiny island and larger love. An elderly artist and her six-year-old grand-daughter while away a summer together on a tiny island in the gulf of Finland. As the two learn to adjust to each other\'s fears, whims and yearnings, a fierce yet understated love emerges - one that encompasses not only the summer inhabitants but the very island itself. Written in a clear, unsentimental style, full of brusque humour, and wisdom, The Summer Book is a profoundly life-affirming story. Tove Jansson captured much of her own life and spirit in the book, which was her favourite of her adult novels. With a foreword by Esther Freud and an afterword by Sophia Jansson (on whom the child \'Sophia\' is based) who returns to the island during the pandemic at the point of becoming a grandmother herself. Includes a 15pp epilogue by Tove\'s niece Sophia Jansson - the inspiration for \'Sophia\' - on a personal and moving return to the island. \'Eccentric, funny, wise, full of joys and small adventures. This is a book for life.\' Esther Freud \'Tove Jansson was a genius. This is a marvellous, beautiful, wise novel, which is also very funny.\' Philip Pullman.', 1, 1, 11, 2, 1, 1, 2003, 1, 2, '192', '12€', 'the-summer-book.jpg', 1, 7, 13),
(18, 'Där isarna råmar', 'Snön tinar och djupt inne i de norrbottniska skogarna hittas en cykel, som visar sig tillhöra en pojke vars försvinnande har förbryllat polisen. Irene har nyligen lämnat Stockholm för jobbet som polis i yttre tjänst, men på stationen i Kalix hamnar hon snart i konflikt med både chefer och fördomsfulla kollegor. I den glest befolkade bygden försiggår samtidigt verksamhet som undgår lagen. I en liten by bor flickan Nina med sin moster och sin allvarligt sjuka mamma. Framtiden är oviss, och mosterns vänner är farliga vänner. Mellan islossning och lövsprickning trappas en jakt upp, där människors sanna väsen ska träda i dagen.', 12, 4, 6, 5, 1, 2, 2021, 3, 5, '342', '25,10€', 'Där isarna råmar.jpg', 1, 7, 19),
(19, 'Läs : boken för dig som vill börja läsa', 'Att knäcka läskoden är både lockande, kul och svårt. Läs – boken för dig som vill börja läsa är perfekt att sätta i händerna på nybörjarläsare, vare sig de är fyra eller åtta år. En matig läsebok som räcker länge, fylld med humor och härliga bilder som stöd för läsningen.\r\n\r\nSvårighetsgraden trappas successivt upp: från superkorta berättelser med enstaka ord i versaler, till längre texter med fullständiga meningar. Små bokstäver introduceras gradvis och pedagogiskt. Nästan alla ord är en- eller tvåstaviga och har ljudenlig stavning. De tydliga, relaterbara berättelserna varvas med bilduppslag där läsaren får para ihop ord och begrepp med detaljer i bilden. Möt kon som började skolan, titta in hemma hos STOR och Liten och läs bak-och-fram med syskonen Rut och Rot. Sanna Borell, Hedvig Häggman-Sund och David Henson står för de träffsäkra illustrationerna.', 13, 5, 1, 6, 1, 2, 2023, 4, 6, '202', '20,10€', 'Las-boken-for-dig-som-vill-borja-lasa.jpg', 1, 7, 20),
(20, 'Midnattsdåd', 'Harry Booth är en av världens skickligaste konst- och juveltjuvar. Han är ovanlig i sin bransch – en bildad gentlemannatjuv med trasig barndom. I Harrys värld gör kärleken en sårbar. När han förälskar sig i Miranda Emerson, sin professors rödhåriga dotter, inser han att han måste bryta sig fri. Bara så kan han våga hoppas på ett lyckligt slut – på något mer värdefullt än allt han någonsin stulit.', 14, 6, 11, 3, 1, 2, 2023, 4, 5, '575', '24,50€', 'Midnattsdåd.jpg', 1, 7, 21);

-- --------------------------------------------------------

--
-- Tabellstruktur `table_bookstatus`
--

CREATE TABLE `table_bookstatus` (
  `bookstatus_id` int(11) NOT NULL,
  `bookstatus_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_bookstatus`
--

INSERT INTO `table_bookstatus` (`bookstatus_id`, `bookstatus_name`) VALUES
(1, 'free'),
(2, 'in reserve'),
(3, 'deleted');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`) VALUES
(1, 'Classic'),
(2, 'Promotional'),
(3, 'Political'),
(4, 'Educational'),
(5, 'Scientific'),
(6, 'Literary-Artistic'),
(11, 'Artistic');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_creator`
--

CREATE TABLE `table_creator` (
  `creator_id` int(11) NOT NULL,
  `creator_firstname` varchar(50) NOT NULL,
  `creator_lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_creator`
--

INSERT INTO `table_creator` (`creator_id`, `creator_firstname`, `creator_lastname`) VALUES
(12, 'Viktoriia', 'Mikhailova'),
(13, 'Viktoriia', 'Mikhailova'),
(19, 'Viktoriia', 'Mikhailova'),
(20, 'Viktoriia', 'Mikhailova'),
(21, 'Viktoriia', 'Mikhailova'),
(26, 'Viktoriia', 'Mikhailova');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_genre`
--

CREATE TABLE `table_genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL,
  `genre_form` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_genre`
--

INSERT INTO `table_genre` (`genre_id`, `genre_name`, `genre_form`) VALUES
(1, 'Childrens fantasy', 'Story'),
(2, 'Adventure', 'Novel'),
(3, 'Romance', 'Show'),
(5, 'Detective', 'Novel'),
(6, 'Child', 'Story');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_illustrator`
--

CREATE TABLE `table_illustrator` (
  `illustrator_id` int(11) NOT NULL,
  `illustrator_firstname` varchar(50) NOT NULL,
  `illustrator_lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_illustrator`
--

INSERT INTO `table_illustrator` (`illustrator_id`, `illustrator_firstname`, `illustrator_lastname`) VALUES
(1, 'Tove', 'Jansson'),
(4, 'Miroslav', 'Sokcic'),
(5, 'Sanna', 'Borell'),
(6, 'Michael', 'Ceken');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_language`
--

CREATE TABLE `table_language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_language`
--

INSERT INTO `table_language` (`language_id`, `language_name`, `language_group`) VALUES
(1, 'English', 'Indo-European'),
(2, 'Swedish', 'Scandinavian'),
(3, 'Finish', 'Fino-Ugric');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_publisher`
--

CREATE TABLE `table_publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_firstname` varchar(50) NOT NULL,
  `publisher_lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_publisher`
--

INSERT INTO `table_publisher` (`publisher_id`, `publisher_firstname`, `publisher_lastname`) VALUES
(1, 'Tove', 'Jansson'),
(3, 'Albert', 'Bonniers Förlag'),
(4, 'Rabén', 'Sjögren');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_reviews`
--

CREATE TABLE `table_reviews` (
  `review_id` int(11) NOT NULL,
  `book_fk` int(11) NOT NULL,
  `raiting` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_reviews`
--

INSERT INTO `table_reviews` (`review_id`, `book_fk`, `raiting`) VALUES
(1, 13, '2'),
(2, 13, '2'),
(3, 13, '5'),
(4, 13, '4'),
(5, 12, '1'),
(6, 18, '5'),
(7, 20, '5'),
(8, 20, '5');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_roles`
--

CREATE TABLE `table_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_roles`
--

INSERT INTO `table_roles` (`role_id`, `role_name`, `role_level`) VALUES
(1, 'User', '1'),
(2, 'Admin', '50'),
(3, 'Super-admin', '99'),
(4, 'Super giga admin', '9999'),
(5, 'Redaktor', '20');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_series`
--

CREATE TABLE `table_series` (
  `series_id` int(11) NOT NULL,
  `series_name` varchar(50) NOT NULL,
  `series_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_series`
--

INSERT INTO `table_series` (`series_id`, `series_name`, `series_number`) VALUES
(1, 'Without series', '1'),
(2, 'Diology', '2'),
(3, 'Trilogy', '3'),
(4, 'Tetralogy', '4'),
(5, 'Pentalogy', '5');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_status`
--

CREATE TABLE `table_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_status`
--

INSERT INTO `table_status` (`status_id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Tabellstruktur `table_users`
--

CREATE TABLE `table_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `role_fk` int(11) NOT NULL,
  `status_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `table_users`
--

INSERT INTO `table_users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `role_fk`, `status_fk`) VALUES
(7, 'Viktoriia', '$2y$10$o3QfzZ8/T/JQj07iJcvsyeikKmnY3P/wjSHVGHFp.HYbYytsQFnXy', 'Viktoriia', 'Mikhailova', 'viktoriia@gmail.com', 2, 1),
(8, 'Anna', '$2y$10$zt75vrHOOVAguzI1yWoIMeRH2XRPPeCo2bwUNM9kzCa', 'Anna', 'Snow', 'anna@gmail.com', 1, 1),
(9, 'Molle', '$2y$10$W6mIpQ1tyxDeotUSY6DqNuFNdo68oOZyA9wj64L7kc/', 'fgdfg', 'dfgd', 'alex5@gmail.com', 1, 1),
(11, 'Emil', '$2y$10$B2aYtg1BhrAZIRvXqksA5euArc2iow/Fn2zlOJ2U38tPDgjvkbAee', 'Emil', 'Wikman', 'emil@gmail.com', 1, 1);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `table_age`
--
ALTER TABLE `table_age`
  ADD PRIMARY KEY (`age_id`);

--
-- Index för tabell `table_author`
--
ALTER TABLE `table_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Index för tabell `table_books`
--
ALTER TABLE `table_books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `bookstatus_fk` (`bookstatus_fk`),
  ADD KEY `age_fk` (`age_fk`),
  ADD KEY `author_fk` (`author_fk`),
  ADD KEY `category_fk` (`category_fk`),
  ADD KEY `genre_fk` (`genre_fk`),
  ADD KEY `illustrator_fk` (`illustrator_fk`),
  ADD KEY `language_fk` (`language_fk`),
  ADD KEY `publisher_fk` (`publisher_fk`),
  ADD KEY `series_fk` (`series_fk`),
  ADD KEY `creator_fk` (`creator_fk`);

--
-- Index för tabell `table_bookstatus`
--
ALTER TABLE `table_bookstatus`
  ADD PRIMARY KEY (`bookstatus_id`);

--
-- Index för tabell `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index för tabell `table_creator`
--
ALTER TABLE `table_creator`
  ADD PRIMARY KEY (`creator_id`);

--
-- Index för tabell `table_genre`
--
ALTER TABLE `table_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index för tabell `table_illustrator`
--
ALTER TABLE `table_illustrator`
  ADD PRIMARY KEY (`illustrator_id`);

--
-- Index för tabell `table_language`
--
ALTER TABLE `table_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Index för tabell `table_publisher`
--
ALTER TABLE `table_publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Index för tabell `table_reviews`
--
ALTER TABLE `table_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Index för tabell `table_roles`
--
ALTER TABLE `table_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index för tabell `table_series`
--
ALTER TABLE `table_series`
  ADD PRIMARY KEY (`series_id`);

--
-- Index för tabell `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Index för tabell `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_fk` (`role_fk`),
  ADD KEY `status_fk` (`status_fk`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `table_age`
--
ALTER TABLE `table_age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `table_author`
--
ALTER TABLE `table_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT för tabell `table_books`
--
ALTER TABLE `table_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT för tabell `table_bookstatus`
--
ALTER TABLE `table_bookstatus`
  MODIFY `bookstatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `table_creator`
--
ALTER TABLE `table_creator`
  MODIFY `creator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT för tabell `table_genre`
--
ALTER TABLE `table_genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `table_illustrator`
--
ALTER TABLE `table_illustrator`
  MODIFY `illustrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `table_language`
--
ALTER TABLE `table_language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `table_publisher`
--
ALTER TABLE `table_publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `table_reviews`
--
ALTER TABLE `table_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `table_roles`
--
ALTER TABLE `table_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `table_series`
--
ALTER TABLE `table_series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `table_status`
--
ALTER TABLE `table_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `table_users`
--
ALTER TABLE `table_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `table_books`
--
ALTER TABLE `table_books`
  ADD CONSTRAINT `table_books_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `table_users` (`user_id`),
  ADD CONSTRAINT `table_books_ibfk_10` FOREIGN KEY (`series_fk`) REFERENCES `table_series` (`series_id`),
  ADD CONSTRAINT `table_books_ibfk_11` FOREIGN KEY (`creator_fk`) REFERENCES `table_creator` (`creator_id`),
  ADD CONSTRAINT `table_books_ibfk_2` FOREIGN KEY (`bookstatus_fk`) REFERENCES `table_bookstatus` (`bookstatus_id`),
  ADD CONSTRAINT `table_books_ibfk_3` FOREIGN KEY (`age_fk`) REFERENCES `table_age` (`age_id`),
  ADD CONSTRAINT `table_books_ibfk_4` FOREIGN KEY (`author_fk`) REFERENCES `table_author` (`author_id`),
  ADD CONSTRAINT `table_books_ibfk_5` FOREIGN KEY (`category_fk`) REFERENCES `table_category` (`category_id`),
  ADD CONSTRAINT `table_books_ibfk_6` FOREIGN KEY (`genre_fk`) REFERENCES `table_genre` (`genre_id`),
  ADD CONSTRAINT `table_books_ibfk_7` FOREIGN KEY (`illustrator_fk`) REFERENCES `table_illustrator` (`illustrator_id`),
  ADD CONSTRAINT `table_books_ibfk_8` FOREIGN KEY (`language_fk`) REFERENCES `table_language` (`language_id`),
  ADD CONSTRAINT `table_books_ibfk_9` FOREIGN KEY (`publisher_fk`) REFERENCES `table_publisher` (`publisher_id`);

--
-- Restriktioner för tabell `table_users`
--
ALTER TABLE `table_users`
  ADD CONSTRAINT `table_users_ibfk_1` FOREIGN KEY (`role_fk`) REFERENCES `table_roles` (`role_id`),
  ADD CONSTRAINT `table_users_ibfk_2` FOREIGN KEY (`status_fk`) REFERENCES `table_status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
