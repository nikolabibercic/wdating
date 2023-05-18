CREATE TABLE sf_country(
	country_id int AUTO_INCREMENT PRIMARY KEY,
	country varchar(100) not null unique
);

CREATE TABLE sf_role(
	role_id int AUTO_INCREMENT PRIMARY KEY,
	role varchar(50) not null unique
);

CREATE TABLE users(
	user_id int AUTO_INCREMENT PRIMARY KEY,
	email varchar(100) not null unique,
    username varchar(100) null,    
    password varchar(100) not null,
	country_id int not null,
    city varchar(100) null,
    role_id int not null,
    profile_image varchar(250) null,
	date_created datetime not null,
	FOREIGN KEY (country_id) REFERENCES sf_country(country_id),
   	FOREIGN KEY (role_id) REFERENCES sf_role(role_id)
);


insert into sf_role values(null,'Admin');
insert into sf_role values(null,'User');