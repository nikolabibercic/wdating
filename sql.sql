CREATE DATABASE wdating;

CREATE TABLE sf_country(
	country_id int AUTO_INCREMENT PRIMARY KEY,
	country varchar(100) not null unique
);

CREATE TABLE sf_role(
	role_id int AUTO_INCREMENT PRIMARY KEY,
	role varchar(50) not null unique
);

CREATE TABLE sf_gender(
	gender_id int AUTO_INCREMENT PRIMARY KEY,
	gender varchar(50) not null unique
);

CREATE TABLE users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	email varchar(100) not null unique,
    username varchar(100) null,    
    password varchar(100) not null,
	country_id int not null,
    city varchar(100) null,
    role_id int not null,
	gender_id int not null,
    profile_image varchar(250) null,
	date_created datetime not null,
	last_login datetime null,
	FOREIGN KEY (country_id) REFERENCES sf_country(country_id),
   	FOREIGN KEY (role_id) REFERENCES sf_role(role_id),
	FOREIGN KEY (gender_id) REFERENCES sf_gender(gender_id)
);


insert into sf_role values(null,'Admin');
insert into sf_role values(null,'User');

-----------------------------------------------------------------------
insert into sf_country values(null,'Serbia');
insert into sf_country values(null,'USA');
insert into sf_country values(null,'Germany');

insert into sf_gender values(null,'Male');
insert into sf_gender values(null,'Female');

insert into users values(null,'nikola@gmail.com','nikola','123',1,'Belgrade',1,1,'',current_time(),current_time());
insert into users values(null,'pera@gmail.com','pera','123',1,'Novi Sad',2,1,'',current_time(),current_time());
