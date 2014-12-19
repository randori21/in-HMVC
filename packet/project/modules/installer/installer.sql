-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. April 2014 jam 06:34
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_nama` varchar(50) DEFAULT NULL,
  `gallery_thumb` text,
  `gallery_keterangan` text,
  `jnsusr_jnsusr_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`,`jnsusr_jnsusr_id`),
  KEY `fk_gallery_jnsusr1_idx` (`jnsusr_jnsusr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `gambar_id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar_nama` varchar(50) DEFAULT NULL,
  `gambar_file` varchar(100) DEFAULT NULL,
  `gambar_alt` varchar(100) DEFAULT NULL,
  `gambar_post` date DEFAULT NULL,
  `post_post_id` int(11) NOT NULL,
  PRIMARY KEY (`gambar_id`,`post_post_id`),
  KEY `fk_gambar_post1_idx` (`post_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak`
--

CREATE TABLE IF NOT EXISTS `hak` (
  `hak_id` int(11) NOT NULL AUTO_INCREMENT,
  `hak_status` set('add','update','del','read') DEFAULT NULL,
  `jnsusr_jnsusr_id` int(11) NOT NULL,
  PRIMARY KEY (`hak_id`,`jnsusr_jnsusr_id`),
  KEY `fk_hak_jnsusr1_idx` (`jnsusr_jnsusr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jnsmenu`
--

CREATE TABLE IF NOT EXISTS `jnsmenu` (
  `jnsmenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `jnsmenu_head` int(11) DEFAULT NULL,
  `jnsmenu_nama` varchar(60) DEFAULT NULL,
  `jnsmenu_keterangan` text,
  `jnsmenu_post` date NOT NULL,
  `jnsmenu_file` varchar(200) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`jnsmenu_id`,`users_id`),
  KEY `fk_jnsmenu_users1_idx` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jnsusr`
--

CREATE TABLE IF NOT EXISTS `jnsusr` (
  `jnsusr_id` int(11) NOT NULL AUTO_INCREMENT,
  `jnsusr_nama` varchar(20) DEFAULT NULL,
  `jnsusr_keterangan` text,
  PRIMARY KEY (`jnsusr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `letak`
--

CREATE TABLE IF NOT EXISTS `letak` (
  `letak_id` int(11) NOT NULL AUTO_INCREMENT,
  `letak_nama` varchar(100) NOT NULL,
  `letak_keterangan` text NOT NULL,
  `jnsmenu_jnsmenu_id` int(11) NOT NULL,
  PRIMARY KEY (`letak_id`,`jnsmenu_jnsmenu_id`),
  KEY `fk_letak_jnsmenu1_idx` (`jnsmenu_jnsmenu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_address` char(200) COLLATE latin1_general_ci DEFAULT '0',
  `link_nama` char(100) COLLATE latin1_general_ci DEFAULT '0',
  `link_keterangan` tinytext COLLATE latin1_general_ci,
  `jnsusr_jnsusr_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`,`jnsusr_jnsusr_id`),
  KEY `idne_2` (`link_id`),
  KEY `fk_link_jnsusr1_idx` (`jnsusr_jnsusr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(11) NOT NULL,
  `media_nama` char(10) DEFAULT NULL,
  `media_file` varchar(200) DEFAULT NULL,
  `media_alt` varchar(50) DEFAULT NULL,
  `media_post` date DEFAULT NULL,
  `post_post_id` int(11) NOT NULL,
  PRIMARY KEY (`media_id`,`post_post_id`),
  KEY `fk_media_post1_idx` (`post_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_author` varchar(20) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_date_edit` date DEFAULT NULL,
  `post_nama` longtext,
  `post_content` text,
  `post_keywords` varchar(100) DEFAULT NULL,
  `post_status` varchar(1) DEFAULT NULL,
  `post_tag` varchar(100) DEFAULT NULL,
  `post_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relmenu`
--

CREATE TABLE IF NOT EXISTS `relmenu` (
  `jnsmenu_jnsmenu_id` int(11) NOT NULL,
  `relmenu_head` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`jnsmenu_jnsmenu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relpost`
--

CREATE TABLE IF NOT EXISTS `relpost` (
  `jnsmenu_jnsmenu_id` int(11) NOT NULL,
  `post_post_id` int(11) NOT NULL,
  PRIMARY KEY (`jnsmenu_jnsmenu_id`,`post_post_id`),
  KEY `fk_relpost_post1_idx` (`post_post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relusers`
--

CREATE TABLE IF NOT EXISTS `relusers` (
  `jnsusr_jnsusr_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`jnsusr_jnsusr_id`,`users_id`),
  KEY `fk_relusers_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `winget`
--

CREATE TABLE IF NOT EXISTS `winget` (
  `winget_id` int(11) NOT NULL,
  `winget_nama` varchar(25) NOT NULL,
  `winget_file` text NOT NULL,
  `winget_status` tinyint(1) NOT NULL,
  `winget_posisi` int(11) NOT NULL,
  `winget_keterangan` text NOT NULL,
  `jnsusr_jnsusr_id` int(11) NOT NULL,
  PRIMARY KEY (`winget_id`,`jnsusr_jnsusr_id`),
  KEY `fk_winget_jnsusr1_idx` (`jnsusr_jnsusr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


