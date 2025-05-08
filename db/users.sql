CREATE TABLE `Users` (
  `user_id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `name_id` bigint(11) NOT NULL,
  FOREIGN KEY (`name_id`) REFERENCES Names(`name_id`),
  `password` varchar(255) NOT NULL,
  `anonymous` boolean NOT NULL,
  `admin` boolean NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
