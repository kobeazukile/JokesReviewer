/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `Jokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apiId` int(20) NOT NULL,
  `setup` text NOT NULL,
  `punchline` text NOT NULL,
  `ratings` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2071 DEFAULT CHARSET=latin1;
