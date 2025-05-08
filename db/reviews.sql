CREATE TABLE `Reviews` (
  `review_id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name_id` bigint(11) NOT NULL,
  FOREIGN KEY (`name_id`) REFERENCES Names(`name_id`),
  `room_num` bigint(11) NOT NULL,
  `rating` TINYINT UNSIGNED,
  `text` VARCHAR(255),
  `date_created` DATE DEFAULT CURRENT_DATE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
