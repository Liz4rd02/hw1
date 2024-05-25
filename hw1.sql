-- create database opgg_database;
use opgg_database;


create table users(
username varchar(16) PRIMARY KEY,
password varchar(16)
);

create table comments(
champName varchar(16),
username varchar(16),
comment_date char(11),
comment_time char(11),
comment_content varchar(1000),

INDEX ind2_username(username),
FOREIGN KEY(username) REFERENCES USERS(username),

primary key(champName, username, comment_date, comment_time)
);

create table favourites(
	username varchar(16),
    summonerName varchar(150),
    
    INDEX ind_username(username),
	FOREIGN KEY(username) REFERENCES USERS(username),
    
    primary key (username,summonerName)
);


