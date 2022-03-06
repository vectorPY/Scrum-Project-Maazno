
-- Land

INSERT INTO `land` (`land_id`, `land`) VALUES ('1', 'Deutschland');

-- Ort

INSERT INTO `ort` (`ort_id`, `ort`, `plz`, `land_id`) VALUES ('1', 'Berlin', '14195', '1');


-- Kategorien

INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('1', 'Spielzeug');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('2', 'Bekleidung');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('3', 'Buecher');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('4', 'Beleuchtung');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('5', 'Elektronik');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('6', 'Drogerie');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('7', 'Computer');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('8', 'Games');
INSERT INTO `kategorie` (`kategorie_id`, `kategorie`) VALUES ('9', 'Lebensmittel');


-- Administrator

INSERT INTO `nutzer` (`nutzer_id`, `name`, `vorname`, `username`, `telefon`, `straße`, `hausnummer`, `passwort`, `ort_id`, `email`)
VALUES ('1', 'Maazno', 'Team', 'Admin', '01525354329', 'Beskidenstraße', '1', '1234', '1', 'support@maazno.de');
