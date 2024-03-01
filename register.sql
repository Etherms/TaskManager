-- sql dump   
    

CREATE TABLE `users` (
    `user_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `reg_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `Category`(
    `category_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `category_name` VARCHAR(65)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `Notes`(
    `note_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `category_id` INT(11) NOT NULL,
    `title` VARCHAR(255),
    `note_content` TEXT,
    `status` VARCHAR(12),
    `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (category_id) REFERENCES Category(category_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;