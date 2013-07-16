-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jul 2013 um 20:59
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `pegasus`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `conversation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime NOT NULL,
  PRIMARY KEY (`conversation_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `conversations`
--

INSERT INTO `conversations` (`conversation_ID`, `start_date`) VALUES
(1, '2013-07-08 03:21:08'),
(2, '2013-07-08 04:17:15'),
(3, '2013-07-08 04:17:26'),
(4, '2013-07-08 04:17:32'),
(5, '2013-07-08 04:17:38'),
(6, '2013-07-08 04:55:42'),
(7, '2013-07-08 05:03:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_bin NOT NULL,
  `describtion` text COLLATE utf8_bin NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `location` text COLLATE utf8_bin NOT NULL,
  `start_year` int(4) NOT NULL,
  `start_month` int(2) NOT NULL,
  `start_day` int(2) NOT NULL,
  `start_time` time NOT NULL,
  `end_year` int(4) NOT NULL,
  `end_month` int(2) NOT NULL,
  `end_day` int(2) NOT NULL,
  `end_time` time NOT NULL,


  PRIMARY KEY (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`event_ID`, `subject`, `describtion`, `owner_ID`, `location`, `start_year`, `start_month`, `start_day`, `start_time`, `end_year`, `end_month`, `end_day`, `end_time`) VALUES
(3, 'Pegasus Projekt', 0x486965722067656874732072756e6420756e642064617320506567617375732050726f6a656b74207769726420766f727467657365747a742121, 1, 0x4d535720626961746368, 2013, 7, 7, '17:00:00', 2013, 7, 7, '18:00:00'),
(4, 'Alter Eintrag', 0x617367, 1, 0x61736466, 2013, 6, 8, '20:55:22', 2013, 6, 9, '21:55:00'),
(5, 'Pegasus Projekt 2.0', 0x4a65747a206765687420646965205061727479206c6f7321, 1, 0x48696572206d61616e, 2013, 7, 7, '19:00:00', 2013, 7, 7, '20:00:00'),
(6, 'Pegasus Projekt 4.0', 0x4869207468657265, 1, 0x6869, 2013, 7, 10, '12:00:00', 2013, 7, 10, '14:00:00'),
(7, 'Pegasus Projekt 3.0', 0xc3b66f6861757366, 1, 0x736c6662, 2013, 7, 9, '12:00:00', 2013, 7, 9, '14:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `send_date` datetime NOT NULL,
  `user_ID` int(11) NOT NULL,
  `message_status` int(11) NOT NULL,
  `conversation_ID` int(11) NOT NULL,
  PRIMARY KEY (`message_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `messages`
--

INSERT INTO `messages` (`message_ID`, `content`, `send_date`, `user_ID`, `message_status`, `conversation_ID`) VALUES
(1, 'ljdfÃ¤lsdkfnldsfnblds', '2013-07-08 03:21:08', 2, 0, 1),
(2, 'Message 2', '2013-07-08 04:17:15', 2, 0, 2),
(3, 'Message 3', '2013-07-08 04:17:26', 2, 0, 3),
(4, 'Message 4', '2013-07-08 04:17:32', 2, 0, 4),
(5, 'Message 5', '2013-07-08 04:17:38', 2, 0, 5),
(6, 'hallo123', '2013-07-08 04:48:24', 2, 0, 0),
(7, 'hallo123', '2013-07-08 04:49:15', 2, 0, 0),
(8, 'ydhdyhaedgr', '2013-07-08 04:49:40', 2, 0, 0),
(9, 's&lt;acascas', '2013-07-08 04:52:23', 2, 0, 0),
(10, 'dbgsdb db ebvedved ', '2013-07-08 04:55:42', 2, 0, 6),
(11, 'dfgdfgdfg', '2013-07-08 05:03:48', 2, 0, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(10) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `counter` int(1) NOT NULL,
  `reg_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_ID`, `last_name`, `first_name`, `title`, `email`, `password`, `birthday`, `status`, `counter`, `reg_date`, `last_login`) VALUES
(1, 'Steidl', 'Maxi', 1, 'maxi.steidl@t-online.de', '10b43971a8295f3720f38fbcdd9d6ac6', '1994-02-15', 1, 0, '2013-06-05', '2013-07-07 20:35:49'),
(2, 'Schmidt', 'André', 1, 'email.andre@gmx.net', 'ecfcb09d14771e375f4a7ed2aa6b25c5', '1994-05-23', 1, 0, '2013-06-05', '2013-07-07 22:02:12'),
(4, 'Mustermann', 'Max', 1, 'max.mustermann@muster.web', '3a81de5f99818842e71bbcb2c420ae49', '2000-02-19', 1, 0, '2013-06-05', '2013-06-14 02:53:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_conversations_lookup`
--

CREATE TABLE IF NOT EXISTS `user_conversations_lookup` (
  `user_ID` int(11) NOT NULL,
  `conversation_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user_conversations_lookup`
--

INSERT INTO `user_conversations_lookup` (`user_ID`, `conversation_ID`) VALUES
(2, 6),
(1, 6),
(2, 7),
(4, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_events_lookup`
--

CREATE TABLE IF NOT EXISTS `user_events_lookup` (
  `user_ID` int(11) NOT NULL,
  `event_ID` int(11) NOT NULL,
  `attendance_state` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`,`event_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user_events_lookup`
--

INSERT INTO `user_events_lookup` (`user_ID`, `event_ID`, `attendance_state`) VALUES
(1, 1, 0),
(1, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
