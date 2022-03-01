
CREATE TABLE IF NOT EXISTS `benutzer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `firmenname` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwort` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sitz` varchar(30) NOT NULL,
  `geschlecht` char(1) NOT NULL,
  `produktbilder` char(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `benutzer` (`id`, `vorname`, `name`, `firmenname`, `username`, `passwort`, `email`, `sitz`, `geschlecht`) VALUES
(1, 'Friedrich', 'Kiltz', 'Mega Gmbh', 'tz', '*FE24531E81971859B9B0B3F09ADF4946A6AA47FB', 'f@kiltz.de', 'Deutschland', 'm'),
(2, '', 'Niemand', '', 'irgendwas', '*FE24531E81971859B9B0B3F09ADF4946A6AA47FB', 'f@kiltz.de', '', '');


CREATE TABLE IF NOT EXISTS `bestandteile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ware_id` bigint(20) NOT NULL,
  `ware_teil_id` bigint(20) NOT NULL,
  `menge` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


INSERT INTO `bestandteile` (`id`, `ware_id`, `ware_teil_id`, `menge`) VALUES
(1, 2, 1, 0.1),
(2, 3, 2, 1),
(3, 4, 2, 5),
(4, 4, 3, 1);

INSERT INTO `ware` (`id`, `name`, `preis`, `gebaude_id`) VALUES
         (1, 'Strom', 0.03, 2),
         (2, 'Wasser', 0.02, 1),
         (3, 'Saatgut', 0.01, 3),
         (4, 'Kartoffeln', 0.14, 3);


CREATE TABLE IF NOT EXISTS `gebaeude` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `gebaeude` (`id`, `name`) VALUES
(1, 'Quelle'),
(2, 'Kraftwerk'),
(3, 'Plantage');

CREATE TABLE IF NOT EXISTS `nachricht` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `absender_id` bigint(20) NOT NULL,
  `empfaenger_id` bigint(20) NOT NULL,
  `betreff` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `uhrzeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gelesen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `nachricht` (`id`, `absender_id`, `empfaenger_id`, `betreff`, `text`, `uhrzeit`, `gelesen`) VALUES
(1, 1, 1, 'test', 'nur ein test', '2014-02-11 13:16:09', 0),
(2, 1, 1, 'TestNachricht', 'Nur ein Test', '2014-02-11 13:49:31', 0),
(3, 1, 2, 'test', 'alkjf\r\n', '2014-02-12 09:31:19', 0);


CREATE TABLE IF NOT EXISTS `ware` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `preis` float NOT NULL,
  `gebaude_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


