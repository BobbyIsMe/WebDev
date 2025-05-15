CREATE TABLE `Reviews` (
  `review_id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES Users(`user_id`),
  `room_id` bigint(11) NOT NULL,
  `rating` TINYINT UNSIGNED,
  `text` VARCHAR(1000),
  `date_created` DATE DEFAULT CURRENT_DATE, 
  `date_modified` DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
