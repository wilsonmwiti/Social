-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Avril 2014 à 07:25
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `social`
--
CREATE DATABASE IF NOT EXISTS `social` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `social`;

-- --------------------------------------------------------

--
-- Structure de la table `social_message`
--

CREATE TABLE IF NOT EXISTS `social_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `social_message`
--

INSERT INTO `social_message` (`id`, `author`, `message`) VALUES
(8, 'alex', 'test <img height="15px" src="web/images/emoticons/smile.png" alt=":)" />'),
(9, 'alex', 'test <img height="15px" src="web/images/emoticons/sad.png" alt=":(" />'),
(10, 'alex', 'test <img height="15px" src="web/images/emoticons/wink.png" alt=";)" />'),
(11, 'test', 'test <img height="15px" src="web/images/emoticons/tongue.png" alt=":p" />'),
(12, 'test', 'test <img height="15px" src="web/images/emoticons/love.png" alt="<3" />'),
(13, 'test', 'test <img height="15px" src="web/images/emoticons/surprised.png" alt=":o" />'),
(14, 'test', 'test <img height="15px" src="web/images/emoticons/crying.png" alt=":''(" />'),
(15, 'Alex', 'salut <img height="15px" src="web/images/emoticons/smile.png" alt=":)" /> ça va ? <img height="15px" src="web/images/emoticons/tongue.png" alt=":p" />'),
(16, 'Alex', '<img height="15px" src="web/images/emoticons/tongue.png" alt=":p" />'),
(17, 'Alex', 'yop <img height="15px" src="web/images/emoticons/wink.png" alt=";)" /> ça va ? <img height="15px" src="web/images/emoticons/tongue.png" alt=":p" /> belle journée hein <img height="15px" src="web/images/emoticons/smile.png" alt=":)" />'),
(18, 'Alex', 'coucou <img height="15px" src="web/images/emoticons/smile.png" alt=":)" /> ça va ?'),
(19, 'Alex', '<img height="15px" src="web/images/emoticons/smile.png" alt=":)" /> <img height="15px" src="web/images/emoticons/tongue.png" alt=":p" /> <img height="15px" src="web/images/emoticons/wink.png" alt=";)" />'),
(20, 'Alex', '<img height="15px" src="web/images/emoticons/smile.png" alt=":)" /> ploop'),
(21, 'alex', 'Test WPF'),
(22, 'Alex', 'Test WPF 2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
