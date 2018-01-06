CREATE TABLE `info` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `evename` varchar(100) DEFAULT NULL,
  `evedate` varchar(32) DEFAULT NULL,
  `evetime` varchar(32) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
   PRIMARY KEY('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;