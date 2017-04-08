-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Računalo: localhost:3306
-- Vrijeme generiranja: Tra 07, 2017 u 02:11 PM
-- Verzija poslužitelja: 5.5.52-cll
-- PHP verzija: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `dapa_archiveweb`
--

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `akvizicije`
--

DROP TABLE IF EXISTS `akvizicije`;
CREATE TABLE IF NOT EXISTS `akvizicije` (
  `akvizicije_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_u_godini` varchar(9) NOT NULL,
  `datum_preuzimanja` date NOT NULL,
  `predavatelj` int(9) NOT NULL,
  `pravna_osnova_predaje` varchar(32) DEFAULT NULL,
  `dokument` varchar(64) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `klasa` varchar(32) DEFAULT NULL,
  `urbroj` varchar(32) DEFAULT NULL,
  `stvaratelj` int(9) NOT NULL,
  `sadrzaj_gradiva` text,
  `vremenski_raspon` varchar(32) DEFAULT NULL,
  `kolicina` varchar(64) DEFAULT NULL,
  `oznaka_fonda` int(9) NOT NULL,
  `smjestaj_gradiva` varchar(64) DEFAULT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`akvizicije_id`),
  KEY `predavatelj` (`predavatelj`),
  KEY `stvaratelj` (`stvaratelj`),
  KEY `oznaka_fonda` (`oznaka_fonda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `akvizicije`
--

INSERT INTO `akvizicije` (`akvizicije_id`, `user_id`, `rb_u_godini`, `datum_preuzimanja`, `predavatelj`, `pravna_osnova_predaje`, `dokument`, `datum`, `klasa`, `urbroj`, `stvaratelj`, `sadrzaj_gradiva`, `vremenski_raspon`, `kolicina`, `oznaka_fonda`, `smjestaj_gradiva`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', '2017-04-07', 1, 'Po službenoj dužnosti', 'Zapisnik o primopredaji arhivskog gradiva', '2017-04-07', '036-01/11-01/09', '2163-56-03-14-2', 1, 'Gradivo sadrži spise sljedećeg sadržaja: rad i opće poslovanje škole, pedagoška dokumentacija, spisi općeg informativnog karaktera, financijska dokumentacija', '1955-1956', '1 arh. košuljica,  0.050 d/m', 1, '', 'Gradivo je nesređeno. Nalazilo se umetnuto u zasebnu košuljicu u kutiji uz gradivo drugog stvaratelja.', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `akvizicije`
--
DROP TRIGGER IF EXISTS `akvizcije_delete`;
DELIMITER //
CREATE TRIGGER `akvizcije_delete` BEFORE DELETE ON `akvizicije`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.akvizicije_id, "Brisanje", "Knjiga akvizicija", "Redni broj upisa", OLD.rb_u_godini, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.akvizicije_id, "Brisanje", "Knjiga akvizicija", "Datum preuzimanja", OLD.datum_preuzimanja, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `akvizicije_update`;
DELIMITER //
CREATE TRIGGER `akvizicije_update` AFTER UPDATE ON `akvizicije`
 FOR EACH ROW BEGIN
    IF (NEW.rb_u_godini != OLD.rb_u_godini) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Redni broj upisa", OLD.rb_u_godini, NEW.rb_u_godini, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_preuzimanja != OLD.datum_preuzimanja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Datum preuzimanja", OLD.datum_preuzimanja , NEW.datum_preuzimanja , NEW.zapis_kreiran);
    END IF;

    IF (NEW.predavatelj != OLD.predavatelj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Naziv predavatelja", OLD.predavatelj, NEW.predavatelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.pravna_osnova_predaje != OLD.pravna_osnova_predaje) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Pravna osnova predaje", OLD.pravna_osnova_predaje, NEW.pravna_osnova_predaje, NEW.zapis_kreiran);
    END IF;

    IF (NEW.dokument != OLD.dokument) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Dokument", OLD.dokument, NEW.dokument, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum != OLD.datum) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Datum", OLD.datum, NEW.datum, NEW.zapis_kreiran);
    END IF;

    IF (NEW.klasa != OLD.klasa) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Klasa", OLD.klasa, NEW.klasa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.urbroj != OLD.urbroj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Urbroj", OLD.urbroj, NEW.urbroj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.stvaratelj != OLD.stvaratelj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Naziv stvaratelja", OLD.stvaratelj, NEW.stvaratelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sadrzaj_gradiva != OLD.sadrzaj_gradiva) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Sadržaj gradiva", OLD.sadrzaj_gradiva, NEW.sadrzaj_gradiva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vremenski_raspon != OLD.vremenski_raspon) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Vremenski raspon", OLD.vremenski_raspon, NEW.vremenski_raspon, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina != OLD.kolicina) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Količina cjeline gradiva", OLD.kolicina, NEW.kolicina, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oznaka_fonda != OLD.oznaka_fonda) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Oznaka fonda", OLD.oznaka_fonda, NEW.oznaka_fonda, NEW.zapis_kreiran);
    END IF;

    IF (NEW.smjestaj_gradiva != OLD.smjestaj_gradiva) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Smještaj gradiva", OLD.smjestaj_gradiva, NEW.smjestaj_gradiva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.akvizicije_id, "Ažuriranje", "Knjiga akvizicija", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `audit_log`
--

DROP TABLE IF EXISTS `audit_log`;
CREATE TABLE IF NOT EXISTS `audit_log` (
  `audit_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `action` varchar(16) NOT NULL,
  `table` varchar(128) NOT NULL,
  `field` varchar(50) NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text,
  `modified` varchar(64) NOT NULL,
  `executed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Izbacivanje podataka za tablicu `audit_log`
--

INSERT INTO `audit_log` (`audit_log_id`, `data_id`, `action`, `table`, `field`, `old_value`, `new_value`, `modified`, `executed`) VALUES
(1, 1, 'Ažuriranje', 'Opći inventar', 'Stvaratelji', '', 'Općina Buje (1420-1797)', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:08:09'),
(2, 2, 'Brisanje', 'Stvaratelji', 'Stvaratelj', 'Talijanska sedmogodišnja škola Pazin', NULL, 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:10:30'),
(3, 1, 'Ažuriranje', 'Knjiga akvizicija', 'Datum preuzimanja', '2014-07-17', '2017-04-07', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:13:17'),
(4, 1, 'Ažuriranje', 'Knjiga akvizicija', 'Datum', '2014-07-17', '2017-04-07', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:13:17'),
(5, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Podloga snimanja', 'Tvrdi disk', 'Mikrofilm', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:21'),
(6, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Tehnika snimanja', 'Skeniranje (u boji)', 'Mikrofilmiranje', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:21'),
(7, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Format filma ili digitalnog zapisa', 'TIFF', '35 mm', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:21'),
(8, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Oblik filma', 'Mikrofiš', 'Mikrofilmski svitak', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:21'),
(9, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Količina zapisa', '208896 kb', '506 snimaka', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:21'),
(10, 1, 'Ažuriranje', 'Knjiga snimljenoga gradiva', 'Vrsta preslike', 'Master datoteka', 'Matični negativ', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:19:40'),
(11, 1, 'Ažuriranje', 'Knjiga dopunskih preslika', 'Signatura izvornika', 'm/36', 'm/36.', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:37:51'),
(12, 1, 'Ažuriranje', 'Knjiga dopunskih preslika', 'Cjelovitost snimanja', 'XVIII-XIX. st.', 'XVII-XVIII. st.', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 11:37:51'),
(13, 4, 'Ažuriranje', 'Dnevnik čitaonice', 'Vrijeme ulaska', '08:00', '09:00', 'Sebastijan Legović, 07.04.2017.', '2017-04-07 12:02:46');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `depoziti`
--

DROP TABLE IF EXISTS `depoziti`;
CREATE TABLE IF NOT EXISTS `depoziti` (
  `depoziti_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_u_godini` varchar(9) NOT NULL,
  `datum_pohrane` date NOT NULL,
  `predavatelj` int(9) NOT NULL,
  `pravna_osnova_predaje` varchar(32) NOT NULL,
  `dokument` varchar(64) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `klasa` varchar(32) DEFAULT NULL,
  `urbroj` varchar(32) DEFAULT NULL,
  `stvaratelj` int(9) NOT NULL,
  `sadrzaj_gradiva` text,
  `vremenski_raspon` varchar(32) DEFAULT NULL,
  `kolicina` varchar(64) DEFAULT NULL,
  `smjestaj_gradiva` varchar(64) DEFAULT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`depoziti_id`),
  KEY `predavatelj` (`predavatelj`),
  KEY `stvaratelj` (`stvaratelj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `depoziti`
--

INSERT INTO `depoziti` (`depoziti_id`, `user_id`, `rb_u_godini`, `datum_pohrane`, `predavatelj`, `pravna_osnova_predaje`, `dokument`, `datum`, `klasa`, `urbroj`, `stvaratelj`, `sadrzaj_gradiva`, `vremenski_raspon`, `kolicina`, `smjestaj_gradiva`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', '2017-04-07', 2, 'Pohrana/depozit', 'Revers', '2017-04-07', '612-06/13-04/12', '2163-56-01-13-2', 3, 'Protokol carsko-kraljevskih odredaba i zakona javno-crkvene prirode, Tom I., 229 brojeva', '1770-1785', '1 knjiga', '', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `depoziti`
--
DROP TRIGGER IF EXISTS `depoziti_delete`;
DELIMITER //
CREATE TRIGGER `depoziti_delete` BEFORE DELETE ON `depoziti`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.depoziti_id, "Brisanje", "Knjiga depozita", "Redni broj upisa", OLD.rb_u_godini, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.depoziti_id, "Brisanje", "Knjiga depozita", "Datum pohrane", OLD.datum_pohrane, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `depoziti_update`;
DELIMITER //
CREATE TRIGGER `depoziti_update` AFTER UPDATE ON `depoziti`
 FOR EACH ROW BEGIN
    IF (NEW.rb_u_godini != OLD.rb_u_godini) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Redni broj upisa", OLD.rb_u_godini, NEW.rb_u_godini, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_pohrane != OLD.datum_pohrane) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Datum pohrane", OLD.datum_pohrane , NEW.datum_pohrane , NEW.zapis_kreiran);
    END IF;

    IF (NEW.predavatelj != OLD.predavatelj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Naziv predavatelja", OLD.predavatelj, NEW.predavatelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.pravna_osnova_predaje != OLD.pravna_osnova_predaje) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Pravna osnova predaje", OLD.pravna_osnova_predaje, NEW.pravna_osnova_predaje, NEW.zapis_kreiran);
    END IF;

    IF (NEW.dokument != OLD.dokument) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Dokument", OLD.dokument, NEW.dokument, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum != OLD.datum) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Datum", OLD.datum, NEW.datum, NEW.zapis_kreiran);
    END IF;

    IF (NEW.klasa != OLD.klasa) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Klasa", OLD.klasa, NEW.klasa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.urbroj != OLD.urbroj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Urbroj", OLD.urbroj, NEW.urbroj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.stvaratelj != OLD.stvaratelj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Naziv stvaratelja", OLD.stvaratelj, NEW.stvaratelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sadrzaj_gradiva != OLD.sadrzaj_gradiva) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Sadržaj gradiva", OLD.sadrzaj_gradiva, NEW.sadrzaj_gradiva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vremenski_raspon != OLD.vremenski_raspon) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Vremenski raspon", OLD.vremenski_raspon, NEW.vremenski_raspon, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina != OLD.kolicina) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Količina cjeline gradiva", OLD.kolicina, NEW.kolicina, NEW.zapis_kreiran);
    END IF;

    IF (NEW.smjestaj_gradiva != OLD.smjestaj_gradiva) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Smještaj gradiva", OLD.smjestaj_gradiva, NEW.smjestaj_gradiva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.depoziti_id, "Ažuriranje", "Knjiga depozita", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `dnevnik_citaonice`
--

DROP TABLE IF EXISTS `dnevnik_citaonice`;
CREATE TABLE IF NOT EXISTS `dnevnik_citaonice` (
  `dnevnik_citaonice_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `prezime_i_ime` int(9) NOT NULL,
  `datum_posjeta` date NOT NULL,
  `vrijeme_ulaska` varchar(5) DEFAULT NULL,
  `vrijeme_izlaska` varchar(5) DEFAULT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`dnevnik_citaonice_id`),
  KEY `prezime_i_ime` (`prezime_i_ime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `dnevnik_citaonice`
--

INSERT INTO `dnevnik_citaonice` (`dnevnik_citaonice_id`, `user_id`, `prezime_i_ime`, `datum_posjeta`, `vrijeme_ulaska`, `vrijeme_izlaska`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, 1, '2017-04-01', '08:00', '09:00', '', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 2, '2017-04-01', '08:00', '09:00', '', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 3, '2017-04-02', '08:00', '18:00', '', 'Sebastijan Legović, 07.04.2017.'),
(4, 1, 2, '2017-04-02', '09:00', '18:00', '', 'Sebastijan Legović, 07.04.2017.'),
(5, 1, 1, '2017-04-03', '08:00', '12:00', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `dnevnik_citaonice`
--
DROP TRIGGER IF EXISTS `dnevnik_citaonice_delete`;
DELIMITER //
CREATE TRIGGER `dnevnik_citaonice_delete` BEFORE DELETE ON `dnevnik_citaonice`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.dnevnik_citaonice_id, "Brisanje", "Dnevnik čitaonice", "Prezime i ime korisnika", OLD.prezime_i_ime, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.dnevnik_citaonice_id, "Brisanje", "Dnevnik čitaonice", "Datum posjeta", OLD.datum_posjeta, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `dnevnik_citaonice_update`;
DELIMITER //
CREATE TRIGGER `dnevnik_citaonice_update` AFTER UPDATE ON `dnevnik_citaonice`
 FOR EACH ROW BEGIN
    IF (NEW.prezime_i_ime != OLD.prezime_i_ime) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.dnevnik_citaonice_id, "Ažuriranje", "Dnevnik čitaonice", "Prezime i ime korisnika", OLD.prezime_i_ime, NEW.prezime_i_ime, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_posjeta != OLD.datum_posjeta) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.dnevnik_citaonice_id, "Ažuriranje", "Dnevnik čitaonice", "Datum posjeta", OLD.datum_posjeta, NEW.datum_posjeta, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrijeme_ulaska != OLD.vrijeme_ulaska) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.dnevnik_citaonice_id, "Ažuriranje", "Dnevnik čitaonice", "Vrijeme ulaska", OLD.vrijeme_ulaska, NEW.vrijeme_ulaska, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrijeme_izlaska != OLD.vrijeme_izlaska) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.dnevnik_citaonice_id, "Ažuriranje", "Dnevnik čitaonice", "Vrijeme izlaska", OLD.vrijeme_izlaska, NEW.vrijeme_izlaska, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.dnevnik_citaonice_id, "Ažuriranje", "Dnevnik čitaonice", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `evidencija_imatelja`
--

DROP TABLE IF EXISTS `evidencija_imatelja`;
CREATE TABLE IF NOT EXISTS `evidencija_imatelja` (
  `evidencija_imatelja_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_upisa` varchar(16) NOT NULL,
  `isprava_o_unosu` text NOT NULL,
  `isprava_o_brisanju` text,
  `maticni_broj` varchar(16) NOT NULL,
  `naziv` text NOT NULL,
  `sjediste` int(9) NOT NULL,
  `adresa` varchar(128) NOT NULL,
  `odgovorna_osoba` varchar(128) NOT NULL,
  `naziv_stvaratelja` text,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`evidencija_imatelja_id`),
  KEY `sjediste` (`sjediste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `evidencija_imatelja`
--

INSERT INTO `evidencija_imatelja` (`evidencija_imatelja_id`, `user_id`, `rb_upisa`, `isprava_o_unosu`, `isprava_o_brisanju`, `maticni_broj`, `naziv`, `sjediste`, `adresa`, `odgovorna_osoba`, `naziv_stvaratelja`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', '07.04.2017., klasa: 034-02/16-02/03, urbroj:  558-02-01/1-16-5', '', '01544551', 'Ured državne uprave u Istarskoj županiji s ispostavama i matičnim uredima', 2, 'Mornarički most 1', 'Juričić Radovan, dipl. iur.', 'Ured državne uprave u Istarskoj županiji s ispostavama i matičnim uredima', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `evidencija_imatelja`
--
DROP TRIGGER IF EXISTS `evidencija_imatelja_delete`;
DELIMITER //
CREATE TRIGGER `evidencija_imatelja_delete` BEFORE DELETE ON `evidencija_imatelja`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_imatelja_id, "Brisanje", "Evidencija imatelja", "Redni broj upisa", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_imatelja_id, "Brisanje", "Evidencija imatelja", "Naziv", OLD.naziv, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `evidencija_imatelja_update`;
DELIMITER //
CREATE TRIGGER `evidencija_imatelja_update` AFTER UPDATE ON `evidencija_imatelja`
 FOR EACH ROW BEGIN
    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Redni broj upisa", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.isprava_o_unosu != OLD.isprava_o_unosu) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Isprava o unosu", OLD.isprava_o_unosu, NEW.isprava_o_unosu, NEW.zapis_kreiran);
    END IF;

    IF (NEW.isprava_o_brisanju != OLD.isprava_o_brisanju) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Isprava o brisanju", OLD.isprava_o_brisanju, NEW.isprava_o_brisanju, NEW.zapis_kreiran);
    END IF;

    IF (NEW.maticni_broj != OLD.maticni_broj) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Matični broj", OLD.maticni_broj, NEW.maticni_broj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv != OLD.naziv) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Naziv(i)/prezime i ime", OLD.naziv, NEW.naziv, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sjediste != OLD.sjediste) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Sjedište", OLD.sjediste, NEW.sjediste, NEW.zapis_kreiran);
    END IF;

    IF (NEW.adresa != OLD.adresa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Adresa", OLD.adresa, NEW.adresa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.odgovorna_osoba != OLD.odgovorna_osoba) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Odgovorna osoba", OLD.odgovorna_osoba, NEW.odgovorna_osoba, NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv_stvaratelja != OLD.naziv_stvaratelja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Stvaratelj", OLD.naziv_stvaratelja, NEW.naziv_stvaratelja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_imatelja_id, "Ažuriranje", "Evidencija imatelja", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `evidencija_korisnika`
--

DROP TABLE IF EXISTS `evidencija_korisnika`;
CREATE TABLE IF NOT EXISTS `evidencija_korisnika` (
  `evidencija_korisnika_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `id_korisnika` int(9) NOT NULL,
  `rb_upisa` varchar(16) NOT NULL,
  `prezime_i_ime` varchar(128) NOT NULL,
  `adresa_stalna` varchar(128) NOT NULL,
  `mjesto_stalno` int(5) NOT NULL,
  `adresa_privremena` varchar(128) DEFAULT NULL,
  `mjesto_privremeno` int(9) DEFAULT NULL,
  `datum_rodenja` date NOT NULL,
  `mjesto_rodenja` int(9) NOT NULL,
  `zvanje` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`evidencija_korisnika_id`),
  KEY `mjesto_stalno` (`mjesto_stalno`),
  KEY `mjesto_privremeno` (`mjesto_privremeno`),
  KEY `mjesto_rodenja` (`mjesto_rodenja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `evidencija_korisnika`
--

INSERT INTO `evidencija_korisnika` (`evidencija_korisnika_id`, `user_id`, `id_korisnika`, `rb_upisa`, `prezime_i_ime`, `adresa_stalna`, `mjesto_stalno`, `adresa_privremena`, `mjesto_privremeno`, `datum_rodenja`, `mjesto_rodenja`, `zvanje`, `zapis_kreiran`) VALUES
(1, 1, 1, '1', 'Kadum Robert ', 'Labinska 47', 2, 'Labinska 47 ', 2, '1971-04-07', 2, 'Stoalr, 3. Maj', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 2, '2', 'Cesco Valentina', 'Via A. Toscanini 5', 4, 'Via A. Toscanini 5 ', 4, '1968-12-26', 4, 'Doktorant, Fossalta di Portoguaro', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 3, '3', 'Jelinčić Jakov', 'Muntriljska 2/A', 1, 'Zagrebačka 2', 3, '1938-04-11', 3, 'Arhivski savjetnik, umirovljenik  ', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `evidencija_korisnika`
--
DROP TRIGGER IF EXISTS `evidencija_korisnika_delete`;
DELIMITER //
CREATE TRIGGER `evidencija_korisnika_delete` BEFORE DELETE ON `evidencija_korisnika`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_korisnika_id, "Brisanje", "Evidencija korisnika", "Redni broj prijave", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_korisnika_id, "Brisanje", "Evidencija korisnika", "Identifikacijski broj", OLD.id_korisnika, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_korisnika_id, "Brisanje", "Evidencija korisnika", "Prezime i ime", OLD.prezime_i_ime, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `evidencija_korisnika_update`;
DELIMITER //
CREATE TRIGGER `evidencija_korisnika_update` AFTER UPDATE ON `evidencija_korisnika`
 FOR EACH ROW BEGIN
    IF (NEW.id_korisnika != OLD.id_korisnika) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Identifikacijski broj", OLD.id_korisnika, NEW.id_korisnika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Redni broj prijave", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.prezime_i_ime != OLD.prezime_i_ime) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Prezime i ime", OLD.prezime_i_ime, NEW.prezime_i_ime, NEW.zapis_kreiran);
    END IF;

    IF (NEW.adresa_stalna != OLD.adresa_stalna) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Adresa stalnog boravka", OLD.adresa_stalna, NEW.adresa_stalna, NEW.zapis_kreiran);
    END IF;

    IF (NEW.mjesto_stalno != OLD.mjesto_stalno) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Mjesto stalnog boravka", OLD.mjesto_stalno, NEW.mjesto_stalno, NEW.zapis_kreiran);
    END IF;

    IF (NEW.adresa_privremena != OLD.adresa_privremena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Adresa privremenog boravka", OLD.adresa_privremena, NEW.adresa_privremena, NEW.zapis_kreiran);
    END IF;

    IF (NEW.mjesto_privremeno != OLD.mjesto_privremeno) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Mjesto privremenog boravka", OLD.mjesto_privremeno, NEW.mjesto_privremeno, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_rodenja != OLD.datum_rodenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Datum rođenja", OLD.datum_rodenja, NEW.datum_rodenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.mjesto_rodenja != OLD.mjesto_rodenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Mjesto rođenja", OLD.mjesto_rodenja, NEW.mjesto_rodenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.zvanje != OLD.zvanje) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_korisnika_id, "Ažuriranje", "Evidencija korisnika", "Zvanje, zanimanje i ustanova", OLD.zvanje, NEW.zvanje, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `evidencija_stvaratelja`
--

DROP TABLE IF EXISTS `evidencija_stvaratelja`;
CREATE TABLE IF NOT EXISTS `evidencija_stvaratelja` (
  `evidencija_stvaratelja_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_upisa` varchar(16) NOT NULL,
  `datum_unosa` date NOT NULL,
  `maticni_broj` varchar(16) NOT NULL,
  `naziv` text NOT NULL,
  `sjediste` int(9) NOT NULL,
  `adresa` varchar(128) NOT NULL,
  `vrijeme_djelovanja` varchar(128) NOT NULL,
  `klasifikacija_djelatnosti` varchar(128) NOT NULL,
  `pravni_status` varchar(64) NOT NULL,
  `povijest_stvaratelja` text NOT NULL,
  `djelatnost` text NOT NULL,
  `organizacijski_ustroj` text NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `veze` text,
  `naziv_imatelja` text,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`evidencija_stvaratelja_id`),
  KEY `sjediste` (`sjediste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `evidencija_stvaratelja`
--

INSERT INTO `evidencija_stvaratelja` (`evidencija_stvaratelja_id`, `user_id`, `rb_upisa`, `datum_unosa`, `maticni_broj`, `naziv`, `sjediste`, `adresa`, `vrijeme_djelovanja`, `klasifikacija_djelatnosti`, `pravni_status`, `povijest_stvaratelja`, `djelatnost`, `organizacijski_ustroj`, `kategorija`, `veze`, `naziv_imatelja`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', '2008-08-03', '123456', 'Ured državne uprave u Istarskoj županiji s ispostavama i matičnim uredima', 2, 'Mornarički park 2', '1929-1947', 'Samostalna pravna osoba', 'Pravna osoba', 'Osnovan je na temelju Dekreta od 6. svibnja 1929. godine br. 972 kojim se i na području Istre, pripojenom Italiji 1918. godine, uvode talijanski propisi o bilježništvu te se osnivaju bilježnički arhivi. ', 'Od osnutka pa do sredine 1944. djelatnost Arhiva obuhvaćala je nadzor nad bilježničkim gradivom izvan Arhiva.', 'Odgovorna osoba, zadužena za opće i financijske poslove bio je upravitelj arhiva, a ovu je funkciju obnašao konzervator (conservatore) kojem je bilo povjereno obavljanje svih stručnih poslova.', 'I. Kategorija', '', 'Ured državne uprave u Istarskoj županiji s ispostavama i matičnim uredima', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `evidencija_stvaratelja`
--
DROP TRIGGER IF EXISTS `evidencija_stvaratelja_delete`;
DELIMITER //
CREATE TRIGGER `evidencija_stvaratelja_delete` BEFORE DELETE ON `evidencija_stvaratelja`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_stvaratelja_id, "Brisanje", "Evidencija stvaratelja", "Redni broj upisa", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.evidencija_stvaratelja_id, "Brisanje", "Evidencija stvaratelja", "Naziv", OLD.naziv, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `evidencija_stvaratelja_update`;
DELIMITER //
CREATE TRIGGER `evidencija_stvaratelja_update` AFTER UPDATE ON `evidencija_stvaratelja`
 FOR EACH ROW BEGIN
    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Redni broj upisa", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_unosa != OLD.datum_unosa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Datum unosa", OLD.datum_unosa, NEW.datum_unosa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.maticni_broj != OLD.maticni_broj) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Matični broj", OLD.maticni_broj, NEW.maticni_broj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv != OLD.naziv) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Naziv(i)/prezime i ime", OLD.naziv, NEW.naziv, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sjediste != OLD.sjediste) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Sjedište/prebivalište", OLD.sjediste, NEW.sjediste, NEW.zapis_kreiran);
    END IF;

    IF (NEW.adresa != OLD.adresa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Adresa", OLD.adresa, NEW.adresa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrijeme_djelovanja != OLD.vrijeme_djelovanja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Vrijeme djelovanja", OLD.vrijeme_djelovanja, NEW.vrijeme_djelovanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.klasifikacija_djelatnosti != OLD.klasifikacija_djelatnosti) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Klasifikacija djelatnosti", OLD.klasifikacija_djelatnosti, NEW.klasifikacija_djelatnosti, NEW.zapis_kreiran);
    END IF;

    IF (NEW.pravni_status != OLD.pravni_status) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Pravni status", OLD.pravni_status, NEW.pravni_status, NEW.zapis_kreiran);
    END IF;

    IF (NEW.povijest_stvaratelja != OLD.povijest_stvaratelja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Povijest stvaratelja", OLD.povijest_stvaratelja, NEW.povijest_stvaratelja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.djelatnost != OLD.djelatnost) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Djelatnost", OLD.djelatnost, NEW.djelatnost, NEW.zapis_kreiran);
    END IF;

    IF (NEW.organizacijski_ustroj != OLD.organizacijski_ustroj) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Organizacijski ustroj", OLD.organizacijski_ustroj, NEW.organizacijski_ustroj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kategorija != OLD.kategorija) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Kategorija", OLD.kategorija, NEW.kategorija, NEW.zapis_kreiran);
    END IF;

    IF (NEW.veze != OLD.veze) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Djelatnost", OLD.veze, NEW.veze, NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv_imatelja != OLD.naziv_imatelja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Djelatnost", OLD.naziv_imatelja, NEW.naziv_imatelja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.evidencija_stvaratelja_id, "Ažuriranje", "Evidencija stvaratelja", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `knjiga_dopunskih_preslika`
--

DROP TABLE IF EXISTS `knjiga_dopunskih_preslika`;
CREATE TABLE IF NOT EXISTS `knjiga_dopunskih_preslika` (
  `knjiga_dopunskih_preslika_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_upisa` varchar(16) NOT NULL,
  `drzava` text NOT NULL,
  `signatura` varchar(128) NOT NULL,
  `signatura_izvornika` varchar(32) NOT NULL,
  `sadrzaj_preslike` varchar(128) NOT NULL,
  `vremenski_raspon_gradiva` varchar(32) NOT NULL,
  `podloga_snimanja` varchar(32) NOT NULL,
  `tehnika_snimanja` varchar(32) NOT NULL,
  `format` varchar(32) NOT NULL,
  `oblik_filma` varchar(32) DEFAULT NULL,
  `vrsta_preslike` varchar(32) NOT NULL,
  `generacija_preslika` varchar(32) NOT NULL,
  `kolicina_zapisa` text NOT NULL,
  `datum_narudzbe` date NOT NULL,
  `podaci_o_nabavi` text NOT NULL,
  `oznaka_smjestaja` varchar(32) NOT NULL,
  `dostupnost` varchar(32) NOT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`knjiga_dopunskih_preslika_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `knjiga_dopunskih_preslika`
--

INSERT INTO `knjiga_dopunskih_preslika` (`knjiga_dopunskih_preslika_id`, `user_id`, `rb_upisa`, `drzava`, `signatura`, `signatura_izvornika`, `sadrzaj_preslike`, `vremenski_raspon_gradiva`, `podloga_snimanja`, `tehnika_snimanja`, `format`, `oblik_filma`, `vrsta_preslike`, `generacija_preslika`, `kolicina_zapisa`, `datum_narudzbe`, `podaci_o_nabavi`, `oznaka_smjestaja`, `dostupnost`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', 'Republika Italija, Trst, Biskupijski arhiv u Trstu (Archivio diocesano Trieste)', 'A1. Diocesi di Pedena', 'm/36.', 'Matricola parochiale di Szaretz e Novaco', 'XVII-XVIII. st.', 'Mikrofilm', 'Mikrofilmiranje', '35 mm', 'Mikrofilmski svitak', 'Dijapozitiv', 'Prva generacija', '300 snimaka', '2017-04-07', 'Otkup od 07.04.2017.', 'GZ-1.1-1/1', 'Dostupno', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `knjiga_dopunskih_preslika`
--
DROP TRIGGER IF EXISTS `knjiga_dopunskih_preslika_delete`;
DELIMITER //
CREATE TRIGGER `knjiga_dopunskih_preslika_delete` BEFORE DELETE ON `knjiga_dopunskih_preslika`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_dopunskih_preslika_id, "Brisanje", "Knjiga dopunskih preslika", "Redni broj upisa", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_dopunskih_preslika_id, "Brisanje", "Knjiga dopunskih preslika", "Sadržaj preslike", OLD.sadrzaj_preslike, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `knjiga_dopunskih_preslika_update`;
DELIMITER //
CREATE TRIGGER `knjiga_dopunskih_preslika_update` AFTER UPDATE ON `knjiga_dopunskih_preslika`
 FOR EACH ROW BEGIN
    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Redni broj upisa preslike", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.drzava != OLD.drzava) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Država, mjesto i ustanova", OLD.drzava, NEW.drzava , NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura != OLD.signatura) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Signatura fonda/zbirke", OLD.signatura, NEW.signatura, NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura_izvornika != OLD.signatura_izvornika) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Signatura izvornika", OLD.signatura_izvornika, NEW.signatura_izvornika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sadrzaj_preslike != OLD.sadrzaj_preslike) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Sadržaj preslike", OLD.sadrzaj_preslike, NEW.sadrzaj_preslike, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vremenski_raspon_gradiva != OLD.vremenski_raspon_gradiva) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Cjelovitost snimanja", OLD.vremenski_raspon_gradiva, NEW.vremenski_raspon_gradiva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.podloga_snimanja != OLD.podloga_snimanja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Podloga snimanja", OLD.podloga_snimanja, NEW.podloga_snimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.tehnika_snimanja != OLD.tehnika_snimanja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Tehnika snimanja", OLD.tehnika_snimanja, NEW.tehnika_snimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.format != OLD.format) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Format filam ili digitalnog zapisa", OLD.format, NEW.format, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oblik_filma != OLD.oblik_filma) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Oblik filma", OLD.oblik_filma, NEW.oblik_filma, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrsta_preslike != OLD.vrsta_preslike) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Vrsta preslike", OLD.vrsta_preslike, NEW.vrsta_preslike, NEW.zapis_kreiran);
    END IF;

    IF (NEW.generacija_preslika != OLD.generacija_preslika) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Generacija preslika", OLD.generacija_preslika, NEW.generacija_preslika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina_zapisa != OLD.kolicina_zapisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Količina zapisa", OLD.kolicina_zapisa, NEW.kolicina_zapisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_narudzbe != OLD.datum_narudzbe) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Datum narudžbe", OLD.datum_narudzbe, NEW.datum_narudzbe, NEW.zapis_kreiran);
    END IF;

    IF (NEW.podaci_o_nabavi != OLD.podaci_o_nabavi) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Podaci o nabavi", OLD.podaci_o_nabavi, NEW.podaci_o_nabavi, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oznaka_smjestaja != OLD.oznaka_smjestaja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Topografska oznaka preslike", OLD.oznaka_smjestaja, NEW.oznaka_smjestaja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.dostupnost != OLD.dostupnost) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Dostupnost", OLD.dostupnost, NEW.dostupnost, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_dopunskih_preslika_id, "Ažuriranje", "Knjiga dopunskih preslika", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `knjiga_restauriranoga_gradiva`
--

DROP TABLE IF EXISTS `knjiga_restauriranoga_gradiva`;
CREATE TABLE IF NOT EXISTS `knjiga_restauriranoga_gradiva` (
  `knjiga_restauriranoga_gradiva_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_upisa` varchar(16) NOT NULL,
  `imatelj` varchar(128) NOT NULL,
  `signatura_fonda` varchar(128) NOT NULL,
  `signatura_izvornika` varchar(128) NOT NULL,
  `vrsta_i_podloga` text NOT NULL,
  `kolicina` text NOT NULL,
  `sazeti_opis_ostecenja` text NOT NULL,
  `sazeti_opis_postupka` text NOT NULL,
  `datum_preuzimanja` date NOT NULL,
  `datum_restauriranja` date NOT NULL,
  `datum_povrata` date NOT NULL,
  `restaurator` varchar(128) NOT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`knjiga_restauriranoga_gradiva_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `knjiga_restauriranoga_gradiva`
--

INSERT INTO `knjiga_restauriranoga_gradiva` (`knjiga_restauriranoga_gradiva_id`, `user_id`, `rb_upisa`, `imatelj`, `signatura_fonda`, `signatura_izvornika`, `vrsta_i_podloga`, `kolicina`, `sazeti_opis_ostecenja`, `sazeti_opis_postupka`, `datum_preuzimanja`, `datum_restauriranja`, `datum_povrata`, `restaurator`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', 'Župni ured Sv.Petar u Šumi', 'Zbirka matičnih knjiga', '7.5 Status Animarum 1877', 'Papirni listovi strojne izrade', '1 knjiga, obim: 210 listova', 'Na papirnoj podlozi (u daljnjem tekstu podloga) strojne izrade tekst je ispisan željezno-galnim crnilom na tiskanom obrascu knjigotiskarskim tiskom. Knjiga ima teška mehanička oštećenja, s vrlo visokim stupanjem oštećenja.', 'Sređivanje listova, odstranjivanje prljavštine, slaganje listova u arke, tj. knjižne slogove točno prateći izvornu numeraciju stranica. Ručno restauriranje metodom ručne laminacije svakoga lista s izradom popune japanskim papirom.', '2017-04-03', '2017-04-03', '2017-04-07', 'Prenc Aldo', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `knjiga_restauriranoga_gradiva`
--
DROP TRIGGER IF EXISTS `knjiga_restauriranoga_gradiva_delete`;
DELIMITER //
CREATE TRIGGER `knjiga_restauriranoga_gradiva_delete` BEFORE DELETE ON `knjiga_restauriranoga_gradiva`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_restauriranoga_gradiva_id, "Brisanje", "Knjiga restauriranoga gradiva", "Redni broj upisa", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_restauriranoga_gradiva_id, "Brisanje", "Knjiga restauriranoga gradiva", "Signatura fonda/zbirke", OLD.signatura_fonda, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_restauriranoga_gradiva_id, "Brisanje", "Knjiga restauriranoga gradiva", "Signatura izvornika", OLD.signatura_izvornika, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `knjiga_restauriranoga_gradiva_update`;
DELIMITER //
CREATE TRIGGER `knjiga_restauriranoga_gradiva_update` AFTER UPDATE ON `knjiga_restauriranoga_gradiva`
 FOR EACH ROW BEGIN
    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Redni broj upisa", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.imatelj != OLD.imatelj) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Imatelj", OLD.imatelj, NEW.imatelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura_fonda != OLD.signatura_fonda) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Signatura fonda/zbirke", OLD.signatura_fonda, NEW.signatura_fonda, NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura_izvornika != OLD.signatura_izvornika) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Signatura izvornika", OLD.signatura_izvornika, NEW.signatura_izvornika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrsta_i_podloga != OLD.vrsta_i_podloga) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Vrsta i podloga", OLD.vrsta_i_podloga, NEW.vrsta_i_podloga, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina != OLD.kolicina) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Količina i dimenzije", OLD.kolicina, NEW.kolicina, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sazeti_opis_ostecenja != OLD.sazeti_opis_ostecenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Sažeti opis oštećenja", OLD.sazeti_opis_ostecenja, NEW.sazeti_opis_ostecenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.sazeti_opis_postupka != OLD.sazeti_opis_postupka) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Sažeti opis postupka", OLD.sazeti_opis_postupka, NEW.sazeti_opis_postupka, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_preuzimanja != OLD.datum_preuzimanja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Datum preuzimanja", OLD.datum_preuzimanja, NEW.datum_preuzimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_restauriranja != OLD.datum_restauriranja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Datum restauriranja", OLD.datum_restauriranja, NEW.datum_restauriranja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_povrata != OLD.datum_povrata) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Datum povrata", OLD.datum_povrata, NEW.datum_povrata, NEW.zapis_kreiran);
    END IF;

    IF (NEW.restaurator != OLD.restaurator) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Prezime i ime restauratora", OLD.restaurator, NEW.restaurator, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.knjiga_restauriranoga_gradiva_id, "Ažuriranje", "Knjiga restauriranoga gradiva", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `knjiga_snimljenoga_gradiva`
--

DROP TABLE IF EXISTS `knjiga_snimljenoga_gradiva`;
CREATE TABLE IF NOT EXISTS `knjiga_snimljenoga_gradiva` (
  `knjiga_snimljenoga_gradiva_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_upisa` int(9) NOT NULL,
  `signatura` varchar(16) NOT NULL,
  `naziv_izvornika` varchar(128) NOT NULL,
  `signatura_preslike` varchar(32) NOT NULL,
  `cjelovitost_snimanja` varchar(16) NOT NULL,
  `podloga_snimanja` varchar(32) NOT NULL,
  `tehnika_snimanja` varchar(32) NOT NULL,
  `format` varchar(32) NOT NULL,
  `oblik_filma` varchar(32) DEFAULT NULL,
  `vrsta_preslike` varchar(32) NOT NULL,
  `generacija_preslika` varchar(32) NOT NULL,
  `kolicina_zapisa` text NOT NULL,
  `odgovorna_osoba` varchar(32) NOT NULL,
  `datum_izrade` date NOT NULL,
  `ustanova` varchar(128) NOT NULL,
  `topografska_oznaka` varchar(64) NOT NULL,
  `dostupnost` varchar(32) NOT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`knjiga_snimljenoga_gradiva_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `knjiga_snimljenoga_gradiva`
--

INSERT INTO `knjiga_snimljenoga_gradiva` (`knjiga_snimljenoga_gradiva_id`, `user_id`, `rb_upisa`, `signatura`, `naziv_izvornika`, `signatura_preslike`, `cjelovitost_snimanja`, `podloga_snimanja`, `tehnika_snimanja`, `format`, `oblik_filma`, `vrsta_preslike`, `generacija_preslika`, `kolicina_zapisa`, `odgovorna_osoba`, `datum_izrade`, `ustanova`, `topografska_oznaka`, `dostupnost`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, 1, 'I/3', 'Udruženja; Predavanje o feminizmu 1904', 'DAPA-AG0027', 'Cjelovito', 'Mikrofilm', 'Mikrofilmiranje', '35 mm', 'Mikrofilmski svitak', 'Matični negativ', 'Prva generacija', '506 snimaka', 'Jakov Kmet', '2017-04-07', 'Državni arhiv u Pazinu', 'GZ-1.1-1/7', 'Dostupno', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `knjiga_snimljenoga_gradiva`
--
DROP TRIGGER IF EXISTS `knjiga_snimljenoga_gradiva_delete`;
DELIMITER //
CREATE TRIGGER `knjiga_snimljenoga_gradiva_delete` BEFORE DELETE ON `knjiga_snimljenoga_gradiva`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_snimljenoga_gradiva_id, "Brisanje", "Knjiga snimljenoga gradiva", "Redni broj upisa", OLD.rb_upisa, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.knjiga_snimljenoga_gradiva_id, "Brisanje", "Knjiga snimljenoga gradiva", "Naziv izvornika", OLD.naziv_izvornika, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `knjiga_snimljenoga_gradiva_update`;
DELIMITER //
CREATE TRIGGER `knjiga_snimljenoga_gradiva_update` AFTER UPDATE ON `knjiga_snimljenoga_gradiva`
 FOR EACH ROW BEGIN
    IF (NEW.rb_upisa != OLD.rb_upisa) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Redni broj upisa preslike", OLD.rb_upisa, NEW.rb_upisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura != OLD.signatura) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Signatura izvornika", OLD.signatura, NEW.signatura , NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv_izvornika != OLD.naziv_izvornika) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Naziv izvornika", OLD.naziv_izvornika, NEW.naziv_izvornika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.signatura_preslike != OLD.signatura_preslike) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Signatura preslike", OLD.signatura_preslike, NEW.signatura_preslike, NEW.zapis_kreiran);
    END IF;

    IF (NEW.cjelovitost_snimanja != OLD.cjelovitost_snimanja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Cjelovitost snimanja", OLD.cjelovitost_snimanja, NEW.cjelovitost_snimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.podloga_snimanja != OLD.podloga_snimanja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Podloga snimanja", OLD.podloga_snimanja, NEW.podloga_snimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.tehnika_snimanja != OLD.tehnika_snimanja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Tehnika snimanja", OLD.tehnika_snimanja, NEW.tehnika_snimanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.format != OLD.format) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Format filma ili digitalnog zapisa", OLD.format, NEW.format, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oblik_filma != OLD.oblik_filma) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Oblik filma", OLD.oblik_filma, NEW.oblik_filma, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrsta_preslike != OLD.vrsta_preslike) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Vrsta preslike", OLD.vrsta_preslike, NEW.vrsta_preslike, NEW.zapis_kreiran);
    END IF;

    IF (NEW.generacija_preslika != OLD.generacija_preslika) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Generacija preslika", OLD.generacija_preslika, NEW.generacija_preslika, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina_zapisa != OLD.kolicina_zapisa) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Količina zapisa", OLD.kolicina_zapisa, NEW.kolicina_zapisa, NEW.zapis_kreiran);
    END IF;

    IF (NEW.odgovorna_osoba != OLD.odgovorna_osoba) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Odgovorna osoba", OLD.odgovorna_osoba, NEW.odgovorna_osoba, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_izrade != OLD.datum_izrade) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Datum izrade", OLD.datum_izrade, NEW.datum_izrade, NEW.zapis_kreiran);
    END IF;

    IF (NEW.ustanova != OLD.ustanova) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Ustanova", OLD.ustanova, NEW.ustanova, NEW.zapis_kreiran);
    END IF;

    IF (NEW.topografska_oznaka != OLD.topografska_oznaka) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Topografska oznaka preslike", OLD.topografska_oznaka, NEW.topografska_oznaka, NEW.zapis_kreiran);
    END IF;

    IF (NEW.dostupnost != OLD.dostupnost) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Dostupnost", OLD.dostupnost, NEW.dostupnost, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.knjiga_snimljenoga_gradiva_id, "Ažuriranje", "Knjiga snimljenoga gradiva", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `mjesta`
--

DROP TABLE IF EXISTS `mjesta`;
CREATE TABLE IF NOT EXISTS `mjesta` (
  `mjesta_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) DEFAULT NULL,
  `mjesto` varchar(64) DEFAULT NULL,
  `postanski_broj` varchar(10) DEFAULT NULL,
  `drzava` varchar(64) DEFAULT NULL,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`mjesta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Izbacivanje podataka za tablicu `mjesta`
--

INSERT INTO `mjesta` (`mjesta_id`, `user_id`, `mjesto`, `postanski_broj`, `drzava`, `zapis_kreiran`) VALUES
(1, 1, 'Pazin', '52000', 'Hrvatska', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 'Pula', '52100', 'Hrvatska', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 'Zagreb', '10000', 'Hrvatska', 'Sebastijan Legović, 07.04.2017.'),
(4, 1, 'Trst', '34121', 'Italija', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `mjesta`
--
DROP TRIGGER IF EXISTS `mjesta_delete`;
DELIMITER //
CREATE TRIGGER `mjesta_delete` BEFORE DELETE ON `mjesta`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.mjesta_id, "Brisanje", "Mjesta", "Mjesto", OLD.mjesto, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `mjesta_update`;
DELIMITER //
CREATE TRIGGER `mjesta_update` AFTER UPDATE ON `mjesta`
 FOR EACH ROW BEGIN
    IF (NEW.mjesto != OLD.mjesto) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.mjesta_id, "Ažuriranje", "Mjesta", "Mjesto", OLD.mjesto, NEW.mjesto, NEW.zapis_kreiran);
    END IF;

    IF (NEW.postanski_broj != OLD.postanski_broj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.mjesta_id, "Ažuriranje", "Mjesta", "Poštanski broj", OLD.postanski_broj, NEW.postanski_broj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.drzava != OLD.drzava) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.mjesta_id, "Ažuriranje", "Mjesta", "Država", OLD.drzava, NEW.drzava, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `opci_inventar`
--

DROP TABLE IF EXISTS `opci_inventar`;
CREATE TABLE IF NOT EXISTS `opci_inventar` (
  `opci_inventar_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `signatura` varchar(16) NOT NULL,
  `klasifikacijska_oznaka` varchar(64) NOT NULL,
  `naziv` varchar(128) NOT NULL,
  `vremenski_raspon` varchar(64) NOT NULL,
  `kolicina` varchar(64) NOT NULL,
  `stupanj_sredenosti` varchar(64) NOT NULL,
  `podfondovi_serije` text,
  `registraturna_pomagala` text,
  `stvaratelji` text,
  `arhivska_pomagala` text,
  `akvizicije` text,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`opci_inventar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `opci_inventar`
--

INSERT INTO `opci_inventar` (`opci_inventar_id`, `user_id`, `signatura`, `klasifikacijska_oznaka`, `naziv`, `vremenski_raspon`, `kolicina`, `stupanj_sredenosti`, `podfondovi_serije`, `registraturna_pomagala`, `stvaratelji`, `arhivska_pomagala`, `akvizicije`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, 'HR-DAPA-1', 'A.1.2.6. Mletačka općinska uprava do 1797.', 'Općina Buje', '1608/1784 ', '2 knj., 3 svež., 0,30 d/m', 'Nesređeno', '', '', 'Općina Buje (1420-1797)', '', '', 'Prema Knjizi općeg inventara, Pregledu iz 1980 (VHARIP, sv. XXIII) te saveznom pregledu (1984.) fond se navodi kao Općina Buje (Municipio di Buie). U razdoblju od 2000. do 2004. godine fond je imao naziv Komuna Buje; Bujski komun.', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 'HR-DAPA-2', 'A.1.2.6. Mletačka općinska uprava do 1797.', 'Općina Labin ', '1420/1797', '30 knj., 1,63 d/m', 'Arhivistički sređeno', 'Gradivo čine knjige Privilegija (1420/1735) i Dukala, terminacija i drugog u vezi s privilegijama u korist labinske općine (1420/1719).', '', 'Općina Labin (1420-1797)', 'ObP-0002/AP-1.1 (s.n. [Historijski arhiv Rijeka], 1964.), ObP-0002/SI-1.1 (Ujčić Tajana, 2002.), ObP-0002/SI-1.2 (Ujčić Tajana, 2007.) ', '', '', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 'HR-DAPA-3', 'A.1.2.6. Mletačka općinska uprava do 1797.', 'Općina Motovun', '1652/1792', '7 kut., 1,40 d/m', 'Arhivistički sređeno', 'Fond sadrži gradivo nastalo djelovanjem načelnikove kancelarije i općinske kancelarije: proglasi, dukali, zapisnici sa sjednica vijeća, građanske procese i knjiga fontika.', '', '', 'ObP-0003/SI-1 (Budicin Biserka, 2014.)', '', 'Arhivski popisi gradiva motovunskog kaptola, dekanata i župe.', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `opci_inventar`
--
DROP TRIGGER IF EXISTS `opci_inventar_delete`;
DELIMITER //
CREATE TRIGGER `opci_inventar_delete` BEFORE DELETE ON `opci_inventar`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.opci_inventar_id, "Brisanje", "Opći inventar", "Redni broj fonda/zbirke", OLD.signatura, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.opci_inventar_id, "Brisanje", "Opći inventar", "Naziv", OLD.naziv, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `opci_inventar_update`;
DELIMITER //
CREATE TRIGGER `opci_inventar_update` AFTER UPDATE ON `opci_inventar`
 FOR EACH ROW BEGIN
    IF (NEW.signatura != OLD.signatura) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Redni broj fonda/zbirke", OLD.signatura, NEW.signatura, NEW.zapis_kreiran);
    END IF;

    IF (NEW.klasifikacijska_oznaka != OLD.klasifikacijska_oznaka) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Klasifikacijska oznaka", OLD.klasifikacijska_oznaka , NEW.klasifikacijska_oznaka , NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv != OLD.naziv) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Naziv fonda/zbirke", OLD.naziv, NEW.naziv, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vremenski_raspon != OLD.vremenski_raspon) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Vremenski raspon", OLD.vremenski_raspon, NEW.vremenski_raspon, NEW.zapis_kreiran);
    END IF;

    IF (NEW.kolicina != OLD.kolicina) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Količina cjeline gradiva", OLD.kolicina, NEW.kolicina, NEW.zapis_kreiran);
    END IF;

    IF (NEW.stupanj_sredenosti != OLD.stupanj_sredenosti) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Stupanj sređenosti", OLD.stupanj_sredenosti, NEW.stupanj_sredenosti, NEW.zapis_kreiran);
    END IF;

    IF (NEW.podfondovi_serije != OLD.podfondovi_serije) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Sadržaj", OLD.podfondovi_serije, NEW.podfondovi_serije, NEW.zapis_kreiran);
    END IF;

    IF (NEW.registraturna_pomagala != OLD.registraturna_pomagala) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Registraturna pomagala", OLD.registraturna_pomagala, NEW.registraturna_pomagala, NEW.zapis_kreiran);
    END IF;

    IF (NEW.stvaratelji != OLD.stvaratelji) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Stvaratelji", OLD.stvaratelji, NEW.stvaratelji, NEW.zapis_kreiran);
    END IF;

    IF (NEW.arhivska_pomagala != OLD.arhivska_pomagala) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Arhivska pomagala", OLD.arhivska_pomagala, NEW.arhivska_pomagala, NEW.zapis_kreiran);
    END IF;

    IF (NEW.akvizicije != OLD.akvizicije) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Akvizicije", OLD.akvizicije, NEW.akvizicije, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.opci_inventar_id, "Ažuriranje", "Opći inventar", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `permission`
--

INSERT INTO `permission` (`id`, `user_type`, `data`) VALUES
(1, 'User', '{"user":"user","predavatelji":{"all_read":"1","all_view":"1"},"akvizicije":{"all_read":"1","all_view":"1"},"depoziti":{"all_read":"1","all_view":"1"},"stvaratelji":{"all_read":"1","all_view":"1"},"opci_inventar":{"all_read":"1","all_view":"1"},"knjiga_snimljenoga_gradiva":{"all_read":"1","all_view":"1"},"knjiga_dopunskih_preslika":{"all_read":"1","all_view":"1"},"knjiga_restauriranoga_gradiva":{"all_read":"1","all_view":"1"},"evidencija_stvaratelja":{"all_read":"1","all_view":"1"},"evidencija_imatelja":{"all_read":"1","all_view":"1"},"evidencija_korisnika":{"all_read":"1","all_view":"1"},"prijavnice":{"all_read":"1","all_view":"1"},"prijavnice_fond":{"all_read":"1","all_view":"1"},"zahtjevnice":{"all_read":"1","all_view":"1"},"zahtjevnice_fond":{"all_read":"1","all_view":"1"},"dnevnik_citaonice":{"all_read":"1","all_view":"1"},"evidencija_koristenoga_gradiva":{"all_read":"1","all_view":"1"},"mjesta":"mjesta"}'),
(2, 'admin', '{"user":{"own_create":"1","own_read":"1","own_update":"1","own_delete":"1","all_create":"1","all_read":"1","all_update":"1","all_delete":"1"},"predavatelji":"predavatelji","akvizicije":"akvizicije","depoziti":"depoziti","stvaratelji":"stvaratelji","opci_inventar":"opci_inventar","knjiga_snimljenoga_gradiva":"knjiga_snimljenoga_gradiva","knjiga_dopunskih_preslika":"knjiga_dopunskih_preslika","knjiga_restauriranoga_gradiva":"knjiga_restauriranoga_gradiva","evidencija_stvaratelja":"evidencija_stvaratelja","evidencija_imatelja":"evidencija_imatelja","evidencija_korisnika":"evidencija_korisnika","prijavnice":"prijavnice","prijavnice_fond":"prijavnice_fond","zahtjevnice":"zahtjevnice","dnevnik_citaonice":"dnevnik_citaonice","evidencija_koristenoga_gradiva":"evidencija_koristenoga_gradiva","mjesta":"mjesta"}');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `predavatelji`
--

DROP TABLE IF EXISTS `predavatelji`;
CREATE TABLE IF NOT EXISTS `predavatelji` (
  `predavatelji_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `predavatelj` varchar(128) NOT NULL,
  `vrsta` varchar(24) NOT NULL,
  `mjesto` int(9) NOT NULL,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`predavatelji_id`),
  KEY `mjesto` (`mjesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Izbacivanje podataka za tablicu `predavatelji`
--

INSERT INTO `predavatelji` (`predavatelji_id`, `user_id`, `predavatelj`, `vrsta`, `mjesto`, `zapis_kreiran`) VALUES
(1, 1, 'Gimnazija i strukovna škola Jurja Dobrile Pazin', 'Pravna osoba', 1, 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 'Dekanatski ured Pazin ', 'Pravna osoba', 1, 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `predavatelji`
--
DROP TRIGGER IF EXISTS `predavatelji_delete`;
DELIMITER //
CREATE TRIGGER `predavatelji_delete` BEFORE DELETE ON `predavatelji`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.predavatelji_id, "Brisanje", "Predavatelji", "Predavatelj", OLD.predavatelj, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `predavatelji_update`;
DELIMITER //
CREATE TRIGGER `predavatelji_update` AFTER UPDATE ON `predavatelji`
 FOR EACH ROW BEGIN
    IF (NEW.predavatelj != OLD.predavatelj) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.predavatelji_id,"Ažuriranje" ,"Predavatelji", "Predavatelj", OLD.predavatelj, NEW.predavatelj, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrsta != OLD.vrsta) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.predavatelji_id, "Ažuriranje", "Predavatelji", "Vrsta", OLD.vrsta, NEW.vrsta, NEW.zapis_kreiran);
    END IF;

    IF (NEW.mjesto != OLD.mjesto) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.predavatelji_id, "Ažuriranje", "Predavatelji", "Mjesto", OLD.mjesto, NEW.mjesto, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `prijavnice`
--

DROP TABLE IF EXISTS `prijavnice`;
CREATE TABLE IF NOT EXISTS `prijavnice` (
  `prijavnice_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_prijave` varchar(16) NOT NULL,
  `prezime_i_ime` int(9) NOT NULL,
  `tema_ili_podrucje_istrazivanja` text NOT NULL,
  `svrha_koristenja` varchar(64) NOT NULL,
  `odgovorna_osoba` varchar(64) DEFAULT NULL,
  `datum_odobrenja` date DEFAULT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`prijavnice_id`),
  KEY `prezime_i_ime` (`prezime_i_ime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `prijavnice`
--

INSERT INTO `prijavnice` (`prijavnice_id`, `user_id`, `rb_prijave`, `prezime_i_ime`, `tema_ili_podrucje_istrazivanja`, `svrha_koristenja`, `odgovorna_osoba`, `datum_odobrenja`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', 1, 'Obiteljsko stablo', 'Genealogija', 'Legović Sebastijan', '2017-04-07', '', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, '2', 2, 'Gradnja palestre', 'Privatna', 'Legović Sebastijan', '2017-04-07', '', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, '3', 3, 'Upravna povijest Općine Poreč', 'Doktorat', 'Legović Sebastijan', '2017-04-07', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `prijavnice`
--
DROP TRIGGER IF EXISTS `prijavnice_delete`;
DELIMITER //
CREATE TRIGGER `prijavnice_delete` BEFORE DELETE ON `prijavnice`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.prijavnice_id, "Brisanje", "Prijavnice", "Redni broj prijave", OLD.rb_prijave, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.prijavnice_id, "Brisanje", "Prijavnice", "Prezime i ime", OLD.prezime_i_ime, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `prijavnice_update`;
DELIMITER //
CREATE TRIGGER `prijavnice_update` AFTER UPDATE ON `prijavnice`
 FOR EACH ROW BEGIN
    IF (NEW.rb_prijave != OLD.rb_prijave) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Redni broj prijave", OLD.rb_prijave, NEW.rb_prijave, NEW.zapis_kreiran);
    END IF;

    IF (NEW.prezime_i_ime != OLD.prezime_i_ime) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Prezime i ime korisnika", OLD.prezime_i_ime, NEW.prezime_i_ime, NEW.zapis_kreiran);
    END IF;

    IF (NEW.tema_ili_podrucje_istrazivanja != OLD.tema_ili_podrucje_istrazivanja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Tema ili područje istraživanja", OLD.tema_ili_podrucje_istrazivanja, NEW.tema_ili_podrucje_istrazivanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.svrha_koristenja != OLD.svrha_koristenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Svrha korištenja", OLD.svrha_koristenja, NEW.svrha_koristenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.odgovorna_osoba != OLD.odgovorna_osoba) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Odgovorna osoba", OLD.odgovorna_osoba, NEW.odgovorna_osoba, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_odobrenja != OLD.datum_odobrenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Datum odobrenja", OLD.datum_odobrenja, NEW.datum_odobrenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_id, "Ažuriranje", "Prijavnice", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `prijavnice_fond`
--

DROP TABLE IF EXISTS `prijavnice_fond`;
CREATE TABLE IF NOT EXISTS `prijavnice_fond` (
  `prijavnice_fond_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `signatura_fonda` int(9) NOT NULL,
  `id_prijave` int(9) NOT NULL,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`prijavnice_fond_id`),
  KEY `signatura` (`signatura_fonda`),
  KEY `id_prijave` (`id_prijave`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `prijavnice_fond`
--

INSERT INTO `prijavnice_fond` (`prijavnice_fond_id`, `user_id`, `signatura_fonda`, `id_prijave`, `zapis_kreiran`) VALUES
(1, 1, 1, 1, 'Sebastijan Legović, 07.04.2017.'),
(2, 1, 2, 1, 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 1, 2, 'Sebastijan Legović, 07.04.2017.'),
(4, 1, 3, 2, 'Sebastijan Legović, 07.04.2017.'),
(5, 1, 3, 3, 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `prijavnice_fond`
--
DROP TRIGGER IF EXISTS `prijavnice_fond_delete`;
DELIMITER //
CREATE TRIGGER `prijavnice_fond_delete` BEFORE DELETE ON `prijavnice_fond`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.prijavnice_fond_id, "Brisanje", "Prijavnice fond", "Prijavnice ID", OLD.id_prijave, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.prijavnice_fond_id, "Brisanje", "Prijavnice fond", "Signatura", OLD.signatura_fonda, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `prijavnice_fond_update`;
DELIMITER //
CREATE TRIGGER `prijavnice_fond_update` AFTER UPDATE ON `prijavnice_fond`
 FOR EACH ROW BEGIN
    IF (NEW.id_prijave != OLD.id_prijave) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_fond_id, "Ažuriranje", "Prijavnice fond", "Prijavnice ID", OLD.id_prijave, NEW.id_prijave, NEW.zapis_kreiran);
    END IF;
  
    IF (NEW.signatura_fonda != OLD.signatura_fonda) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.prijavnice_fond_id, "Ažuriranje", "Prijavnice fond", "Signatura fonda/zbirke", OLD.signatura_fonda, NEW.signatura_fonda, NEW.zapis_kreiran);
    END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(122) unsigned NOT NULL AUTO_INCREMENT,
  `keys` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `stvaratelji`
--

DROP TABLE IF EXISTS `stvaratelji`;
CREATE TABLE IF NOT EXISTS `stvaratelji` (
  `stvaratelji_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `naziv_stvaratelja` varchar(128) NOT NULL,
  `vrijeme_djelovanja` varchar(64) NOT NULL,
  `mjesto` int(9) NOT NULL,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`stvaratelji_id`),
  KEY `mjesto` (`mjesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `stvaratelji`
--

INSERT INTO `stvaratelji` (`stvaratelji_id`, `user_id`, `naziv_stvaratelja`, `vrijeme_djelovanja`, `mjesto`, `zapis_kreiran`) VALUES
(1, 1, 'Narodna škola Pazin', '1955-1956', 1, 'Sebastijan Legović, 07.04.2017.'),
(3, 1, 'Dekanatski ured Pazin', '1770-1785', 1, 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `stvaratelji`
--
DROP TRIGGER IF EXISTS `stvaratelji_delete`;
DELIMITER //
CREATE TRIGGER `stvaratelji_delete` BEFORE DELETE ON `stvaratelji`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.stvaratelji_id, "Brisanje", "Stvaratelji", "Stvaratelj", OLD.naziv_stvaratelja, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `stvaratelji_update`;
DELIMITER //
CREATE TRIGGER `stvaratelji_update` AFTER UPDATE ON `stvaratelji`
 FOR EACH ROW BEGIN
    IF (NEW.naziv_stvaratelja != OLD.naziv_stvaratelja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.stvaratelji_id, "Ažuriranje", "Stvaratelji", "Stvaratelj", OLD.naziv_stvaratelja, NEW.naziv_stvaratelja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.vrijeme_djelovanja != OLD.vrijeme_djelovanja) THEN
        INSERT INTO audit_log 
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.stvaratelji_id, "Ažuriranje", "Stvaratelji", "Vrijeme djelovanja", OLD.vrijeme_djelovanja, NEW.vrijeme_djelovanja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.mjesto != OLD.mjesto) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` ) 
        VALUES 
            (NEW.stvaratelji_id, "Ažuriranje", "Stvaratelji", "Sjedište", OLD.mjesto, NEW.mjesto, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) DEFAULT NULL,
  `user_type` varchar(16) DEFAULT NULL,
  `profile_pic` varchar(64) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `is_deleted` int(2) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `var_key` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Izbacivanje podataka za tablicu `users`
--

INSERT INTO `users` (`users_id`, `user_id`, `user_type`, `profile_pic`, `email`, `password`, `name`, `is_deleted`, `status`, `var_key`) VALUES
(1, '1', 'admin', 'admin_1489067793.png', 'admin@admin.com', '$2y$10$ao6mD/V6uOlmB.S.dfhfj.6RBUfEOlKw.oK8TiQ..VIhZOUFlNXiG', 'Sebastijan Legović', 0, 'aktivan', ''),
(2, '1', 'User', 'user.png', 'user@admin.com', '$2y$10$YPRYbbc2Uez8PD0KP8.kOe1mhmZqGjaS9WNDGHN7cWYYOHMzV1Luq', 'Ivo Ivić', 0, 'aktivan', NULL);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `zahtjevnice`
--

DROP TABLE IF EXISTS `zahtjevnice`;
CREATE TABLE IF NOT EXISTS `zahtjevnice` (
  `zahtjevnice_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `rb_zahtjeva` varchar(9) NOT NULL,
  `prezime_i_ime` int(9) NOT NULL,
  `datum_zahtjeva` date NOT NULL,
  `oblik_koristenja` varchar(64) NOT NULL,
  `napomena` text,
  `zapis_kreiran` varchar(64) NOT NULL,
  PRIMARY KEY (`zahtjevnice_id`),
  KEY `prezime_i_ime` (`prezime_i_ime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `zahtjevnice`
--

INSERT INTO `zahtjevnice` (`zahtjevnice_id`, `user_id`, `rb_zahtjeva`, `prezime_i_ime`, `datum_zahtjeva`, `oblik_koristenja`, `napomena`, `zapis_kreiran`) VALUES
(1, 1, '1', 1, '2017-04-07', 'Korištenje izvornika', '', 'Sebastijan Legović, 07.04.2017.'),
(2, 1, '2', 2, '2017-04-07', 'Korištenje izvornika', '', 'Sebastijan Legović, 07.04.2017.'),
(3, 1, '3', 3, '2017-04-07', 'Narudžba za snimanje gradiva', '', 'Sebastijan Legović, 07.04.2017.');

--
-- Okidači `zahtjevnice`
--
DROP TRIGGER IF EXISTS `zahtjevnice_delete`;
DELIMITER //
CREATE TRIGGER `zahtjevnice_delete` BEFORE DELETE ON `zahtjevnice`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.zahtjevnice_id, "Brisanje", "Zahtjevnice", "Redni broj zahtjeva", OLD.rb_zahtjeva, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.zahtjevnice_id, "Brisanje", "Zahtjevnice", "Datum zahtjeva", OLD.datum_zahtjeva, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.zahtjevnice_id, "Brisanje", "Zahtjevnice", "Prezime i ime korisnika", OLD.prezime_i_ime, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `zahtjevnice_update`;
DELIMITER //
CREATE TRIGGER `zahtjevnice_update` AFTER UPDATE ON `zahtjevnice`
 FOR EACH ROW BEGIN
    IF (NEW.rb_zahtjeva != OLD.rb_zahtjeva) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_id, "Ažuriranje", "Zahtjevnice", "Redni broj zahtjeva", OLD.rb_zahtjeva, NEW.rb_zahtjeva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.prezime_i_ime != OLD.prezime_i_ime) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_id, "Ažuriranje", "Zahtjevnice", "Prezime i ime korisnika", OLD.prezime_i_ime, NEW.prezime_i_ime, NEW.zapis_kreiran);
    END IF;

    IF (NEW.datum_zahtjeva != OLD.datum_zahtjeva) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_id, "Ažuriranje", "Zahtjevnice", "Datum zahtjeva", OLD.datum_zahtjeva, NEW.datum_zahtjeva, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oblik_koristenja != OLD.oblik_koristenja) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_id, "Ažuriranje", "Zahtjevnice", "Oblik korištenja", OLD.oblik_koristenja, NEW.oblik_koristenja, NEW.zapis_kreiran);
    END IF;

    IF (NEW.napomena != OLD.napomena) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_id, "Ažuriranje", "Zahtjevnice", "Napomena", OLD.napomena, NEW.napomena, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `zahtjevnice_fond`
--

DROP TABLE IF EXISTS `zahtjevnice_fond`;
CREATE TABLE IF NOT EXISTS `zahtjevnice_fond` (
  `zahtjevnice_fond_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `signatura_fonda` int(9) NOT NULL,
  `oznaka` varchar(32) NOT NULL,
  `naziv_jedinice` text NOT NULL,
  `zapis_kreiran` varchar(64) NOT NULL,
  `id_zahtjeva` int(9) NOT NULL,
  PRIMARY KEY (`zahtjevnice_fond_id`),
  KEY `signatura` (`signatura_fonda`,`id_zahtjeva`),
  KEY `id_zahtjeva` (`id_zahtjeva`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `zahtjevnice_fond`
--

INSERT INTO `zahtjevnice_fond` (`zahtjevnice_fond_id`, `user_id`, `signatura_fonda`, `oznaka`, `naziv_jedinice`, `zapis_kreiran`, `id_zahtjeva`) VALUES
(1, 1, 1, '6', 'Novigradski statut 14-16 st.', 'Sebastijan Legović, 07.04.2017.', 1),
(2, 1, 3, '138', 'Novigrad, spisi, 1730-1732', 'Sebastijan Legović, 07.04.2017.', 1),
(3, 1, 3, '138', 'Novigrad, spisi, 1730-1732', 'Sebastijan Legović, 07.04.2017.', 2),
(4, 1, 3, '138', 'Novigrad, spisi, 1730-1732', 'Sebastijan Legović, 07.04.2017.', 3),
(5, 1, 2, '34', 'MKU Barban 1717-1751', 'Sebastijan Legović, 07.04.2017.', 3);

--
-- Okidači `zahtjevnice_fond`
--
DROP TRIGGER IF EXISTS `zahtjevnice_fond_delete`;
DELIMITER //
CREATE TRIGGER `zahtjevnice_fond_delete` BEFORE DELETE ON `zahtjevnice_fond`
 FOR EACH ROW BEGIN
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.zahtjevnice_fond_id, "Brisanje", "Zahtjevnice fond", "Zahtjevnice ID", OLD.id_zahtjeva, NULL, OLD.zapis_kreiran);
INSERT INTO audit_log
(`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified`)
VALUES
(OLD.zahtjevnice_fond_id, "Brisanje", "Zahtjevnice fond", "Signatura", OLD.signatura_fonda, NULL, OLD.zapis_kreiran);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `zahtjevnice_fond_update`;
DELIMITER //
CREATE TRIGGER `zahtjevnice_fond_update` AFTER UPDATE ON `zahtjevnice_fond`
 FOR EACH ROW BEGIN
    IF (NEW.id_zahtjeva != OLD.id_zahtjeva) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_fond_id, "Ažuriranje", "Zahtjevnice fond", "Zahtjevnice ID", OLD.id_zahtjeva, NEW.id_zahtjeva, NEW.zapis_kreiran);
    END IF;
  
    IF (NEW.signatura_fonda != OLD.signatura_fonda) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_fond_id, "Ažuriranje", "Zahtjevnice fond", "Signatura fonda/zbirke", OLD.signatura_fonda, NEW.signatura_fonda, NEW.zapis_kreiran);
    END IF;

    IF (NEW.oznaka != OLD.oznaka) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_fond_id, "Ažuriranje", "Zahtjevnice fond", "Oznaka arhivske jedinice", OLD.oznaka, NEW.oznaka, NEW.zapis_kreiran);
    END IF;

    IF (NEW.naziv_jedinice != OLD.naziv_jedinice) THEN
        INSERT INTO audit_log
            (`data_id` , `action`, `table` , `field` , `old_value` , `new_value` , `modified` )
        VALUES
            (NEW.zahtjevnice_fond_id, "Ažuriranje", "Zahtjevnice fond", "Naziv arhivske jedinice", OLD.naziv_jedinice, NEW.naziv_jedinice, NEW.zapis_kreiran);
    END IF;
END
//
DELIMITER ;

--
-- Ograničenja za izbačene tablice
--

--
-- Ograničenja za tablicu `akvizicije`
--
ALTER TABLE `akvizicije`
  ADD CONSTRAINT `akvizicije_ibfk_1` FOREIGN KEY (`predavatelj`) REFERENCES `predavatelji` (`predavatelji_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `akvizicije_ibfk_2` FOREIGN KEY (`stvaratelj`) REFERENCES `stvaratelji` (`stvaratelji_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `akvizicije_ibfk_3` FOREIGN KEY (`oznaka_fonda`) REFERENCES `opci_inventar` (`opci_inventar_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `depoziti`
--
ALTER TABLE `depoziti`
  ADD CONSTRAINT `depoziti_ibfk_1` FOREIGN KEY (`predavatelj`) REFERENCES `predavatelji` (`predavatelji_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `depoziti_ibfk_2` FOREIGN KEY (`stvaratelj`) REFERENCES `stvaratelji` (`stvaratelji_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `dnevnik_citaonice`
--
ALTER TABLE `dnevnik_citaonice`
  ADD CONSTRAINT `dnevnik_citaonice_ibfk_1` FOREIGN KEY (`prezime_i_ime`) REFERENCES `evidencija_korisnika` (`evidencija_korisnika_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `evidencija_imatelja`
--
ALTER TABLE `evidencija_imatelja`
  ADD CONSTRAINT `evidencija_imatelja_ibfk_1` FOREIGN KEY (`sjediste`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `evidencija_korisnika`
--
ALTER TABLE `evidencija_korisnika`
  ADD CONSTRAINT `evidencija_korisnika_ibfk_1` FOREIGN KEY (`mjesto_stalno`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evidencija_korisnika_ibfk_2` FOREIGN KEY (`mjesto_privremeno`) REFERENCES `mjesta` (`mjesta_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `evidencija_korisnika_ibfk_3` FOREIGN KEY (`mjesto_rodenja`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `evidencija_stvaratelja`
--
ALTER TABLE `evidencija_stvaratelja`
  ADD CONSTRAINT `evidencija_stvaratelja_ibfk_1` FOREIGN KEY (`sjediste`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `predavatelji`
--
ALTER TABLE `predavatelji`
  ADD CONSTRAINT `pred_mjesta_fk` FOREIGN KEY (`mjesto`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `prijavnice`
--
ALTER TABLE `prijavnice`
  ADD CONSTRAINT `prijavnice_ibfk_1` FOREIGN KEY (`prezime_i_ime`) REFERENCES `evidencija_korisnika` (`evidencija_korisnika_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `prijavnice_fond`
--
ALTER TABLE `prijavnice_fond`
  ADD CONSTRAINT `prijavnice_fond_ibfk_2` FOREIGN KEY (`id_prijave`) REFERENCES `prijavnice` (`prijavnice_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prijavnice_fond_ibfk_3` FOREIGN KEY (`signatura_fonda`) REFERENCES `opci_inventar` (`opci_inventar_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `stvaratelji`
--
ALTER TABLE `stvaratelji`
  ADD CONSTRAINT `stvaratelji_ibfk_1` FOREIGN KEY (`mjesto`) REFERENCES `mjesta` (`mjesta_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `zahtjevnice`
--
ALTER TABLE `zahtjevnice`
  ADD CONSTRAINT `zahtjevnice_ibfk_1` FOREIGN KEY (`prezime_i_ime`) REFERENCES `evidencija_korisnika` (`evidencija_korisnika_id`) ON UPDATE CASCADE;

--
-- Ograničenja za tablicu `zahtjevnice_fond`
--
ALTER TABLE `zahtjevnice_fond`
  ADD CONSTRAINT `zahtjevnice_fond_ibfk_2` FOREIGN KEY (`id_zahtjeva`) REFERENCES `zahtjevnice` (`zahtjevnice_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zahtjevnice_fond_ibfk_3` FOREIGN KEY (`signatura_fonda`) REFERENCES `opci_inventar` (`opci_inventar_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
