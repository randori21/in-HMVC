-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. April 2014 jam 08:00
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8


-- --------------------------------------------------------

--
-- Struktur dari tabel `generalsettings`
--

CREATE TABLE IF NOT EXISTS `generalsettings` (
  `GSID` int(11) NOT NULL AUTO_INCREMENT,
  `BLOGName` varchar(300) NOT NULL,
  `BLOGTitle` varchar(300) NOT NULL,
  `BLOGMaintainedBy` varchar(300) NOT NULL,
  `GuestView` varchar(30) NOT NULL,
  `EnableMORE` varchar(30) NOT NULL,
  `ShowRecentComments` varchar(30) NOT NULL,
  `ShowRecentPosts` varchar(30) NOT NULL,
  `ShowCalendar` varchar(30) NOT NULL,
  `ShowOnlineMembers` varchar(30) NOT NULL,
  `ShowOnlineGuests` varchar(30) NOT NULL,
  `ShowOnlineMemberNames` varchar(30) NOT NULL,
  `EnableCommentNotification` varchar(30) NOT NULL,
  `EnablePostScheduling` varchar(30) NOT NULL,
  `EnableUploadingFiles` varchar(30) NOT NULL,
  `UploadFileSize` varchar(100) NOT NULL,
  `EnableComments` varchar(30) NOT NULL,
  `EnablePlugins` varchar(30) NOT NULL,
  `EnableRegistration` varchar(30) NOT NULL,
  `EnableGuestComment` varchar(30) NOT NULL,
  `SendRegistrationMessage` varchar(30) NOT NULL,
  `ThemeName` varchar(400) NOT NULL,
  `ThemeAdmin` varchar(400) NOT NULL,
  `Kontak` text NOT NULL,
  PRIMARY KEY (`GSID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `generalsettings`
--

INSERT INTO `generalsettings` (`GSID`, `BLOGName`, `BLOGTitle`, `BLOGMaintainedBy`, `GuestView`, `EnableMORE`, `ShowRecentComments`, `ShowRecentPosts`, `ShowCalendar`, `ShowOnlineMembers`, `ShowOnlineGuests`, `ShowOnlineMemberNames`, `EnableCommentNotification`, `EnablePostScheduling`, `EnableUploadingFiles`, `UploadFileSize`, `EnableComments`, `EnablePlugins`, `EnableRegistration`, `EnableGuestComment`, `SendRegistrationMessage`, `ThemeName`, `ThemeAdmin`, `Kontak`) VALUES
(1, 'Ringkes', 'Mempermudah Anda Bekerja', 'Ringkes', '1', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '1', 'green', 'black', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
