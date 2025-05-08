CREATE TABLE `Rents` (
  `rent_id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  `room_id` bigint(11) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES Users(`user_id`),
  FOREIGN KEY (`room_id`) REFERENCES Rooms(`room_id`),
  `boarder_type` ENUM('single', 'double') NOT NULL,
  `status` ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
  `check_in_date` DATE,
  `due_date` DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
