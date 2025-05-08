CREATE TABLE `Bills` (
  `bill_id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `rent_id` bigint(11) NOT NULL,
  FOREIGN KEY (`rent_id`) REFERENCES Rents(`rent_id`),
  `electricity_bill` DECIMAL(8, 2),
  `miscellaneous_bill` DECIMAL(8, 2),
  `rent_bill` DECIMAL(8, 2),
  `total_bill` DECIMAL(8, 2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
