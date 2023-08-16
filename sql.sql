CREATE DATABASE wdating;

CREATE TABLE `sf_status` (
  `status_id` int AUTO_INCREMENT PRIMARY KEY,
  `status` varchar(255)
);

CREATE TABLE `sf_country` (
  `country_id` int AUTO_INCREMENT PRIMARY KEY,
  `country` varchar(255)
);

CREATE TABLE `sf_gender` (
  `gender_id` int AUTO_INCREMENT PRIMARY KEY,
  `gender` varchar(255)
);

CREATE TABLE `sf_role` (
  `role_id` int AUTO_INCREMENT PRIMARY KEY,
  `role` varchar(255)
);

CREATE TABLE `users` (
  `user_id` int AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `country_id` int,
  `city` varchar(255),
  `role_id` int,
  `gender_id` int,
  `profile_image` varchar(255),
  `date_created` datetime,
  `last_login` date,
  `status_id` int
);

CREATE TABLE `blocked` (
  `blocked_id` int AUTO_INCREMENT PRIMARY KEY,
  `user_id` int,
  `user_blocked_id` int,
  `blocking_date` datetime
);

CREATE TABLE `messages` (
  `message_id` int AUTO_INCREMENT PRIMARY KEY,
  `user_send_id` int,
  `user_receive_id` int,
  `message_date` datetime
);

CREATE TABLE `likes` (
  `like_id` int AUTO_INCREMENT PRIMARY KEY,
  `user_id` int,
  `user_liked_id` int,
  `like_date` datetime
);

ALTER TABLE `users` ADD FOREIGN KEY (`country_id`) REFERENCES `sf_country` (`country_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`gender_id`) REFERENCES `sf_gender` (`gender_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`role_id`) REFERENCES `sf_role` (`role_id`);

ALTER TABLE `messages` ADD FOREIGN KEY (`user_send_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `messages` ADD FOREIGN KEY (`user_receive_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `blocked` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `blocked` ADD FOREIGN KEY (`user_blocked_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`user_liked_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`status_id`) REFERENCES `sf_status` (`status_id`);



insert into sf_role values(null,'Admin');
insert into sf_role values(null,'User');

insert into sf_country values(null,'Serbia');
insert into sf_country values(null,'USA');
insert into sf_country values(null,'Germany');

insert into sf_gender values(null,'Male');
insert into sf_gender values(null,'Female');

insert into sf_status values(null,'Pending');
insert into sf_status values(null,'Approved');
insert into sf_status values(null,'Blocked');

insert into users values(null,'nikola@gmail.com','nikola','123',1,'Belgrade',1,1,'',current_time(),current_time(),1);
insert into users values(null,'pera@gmail.com','pera','123',1,'Novi Sad',2,1,'',current_time(),current_time(),2);
