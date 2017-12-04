DROP DATABASE IF EXISTS cheapomail;
CREATE DATABASE cheapomail;
USE cheapomail;

-- Create table 'Users'

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int NOT NULL auto_increment PRIMARY KEY,
    `firstname` char(255) NOT NULL default '',
    `lastname` varchar(255) NOT NULL default '',
    `username` varchar(255) NOT NULL default '',
    `password` varchar(255) NOT NULL default ''
);

-- Create table 'Messages'

DROP TABLE IF EXISTS `Messages`;
CREATE TABLE `Messages` (
    `id` int NOT NULL auto_increment PRIMARY KEY,
    `recipient_ids` int NOT NULL default '0',
    `sender_id` int NOT NULL default '0',
    `subject` varchar(255) NOT NULL default '',
    `body` varchar(255) NOT NULL default '',
    `date_sent` DATE NOT NULL
);

-- Create table Messages_read

DROP TABLE IF EXISTS `Messages_read`;
CREATE TABLE `Messages_read` (
    `id` int NOT NULL auto_increment PRIMARY KEY,
    `message_id` int NOT NULL default '0',
    `reader_id` int NOT NULL default '0',
    `date_read` DATE NOT NULL;
);

-- Create Admin Account

INSERT INTO `Users` VALUES(1,'Gawayne','Lawton','admin', sha1('password123'));

-- Show created tables
SHOW TABLES;
SELECT * FROM user;
SELECT * FROM message;
SELECT * FROM message_read;