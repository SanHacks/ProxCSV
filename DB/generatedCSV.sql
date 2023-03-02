
CREATE TABLE IF NOT EXISTS `csv_import` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `surname` varchar(255) DEFAULT NULL,
    `id_number` varchar(255) DEFAULT NULL,
    `DOB` varchar(255) DEFAULT NULL,
    `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;