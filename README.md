# multiLevelMenu
Multilevel menu written in php and mysql


# Instructions
1. Create database zadatak_izbornik and table izbornik:
CREATE TABLE izbornik (
id int(11) unsigned primary key auto_increment,
title varchar(255) NOT NULL,
parent_id int(11) unsigned DEFAULT NULL,
FOREIGN KEY (parent_id) REFERENCES izbornik(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

2. modify Config.php to your mysql username and password

3. run
