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

INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (1, 'Prvi', NULL);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (2, 'Drugi', NULL);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (3, 'Treći', NULL);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (4, 'Prvi-child1', 1);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (5, 'Prvi-child2', 1);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (6, 'Prvi-child3', 1);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (7, 'Prvi-child1-child1', 4);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (8, 'Prvi-child1-child2', 4);
INSERT INTO `izbornik` (`id`, `title`, `parent_id`) VALUES (9, 'Drugi-child1', 2);

2. modify Config.php to your mysql username and password

3. run
