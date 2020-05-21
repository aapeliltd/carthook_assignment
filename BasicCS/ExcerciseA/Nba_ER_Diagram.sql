CREATE TABLE `Players` (
`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(40) NOT NULL,
`dob` date NULL,
`height` double NULL,
`weight` double NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `Teams` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(40) NOT NULL,
`city_id` int(11) NOT NULL,
`player_id` int(11) NULL,
`start_date` date NULL,
`end_date` date NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `Countries` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `Cities` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`country_id` int(11) NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `Games` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`home_team_id` int(11) NULL,
`away_team_id` int(11) NULL,
`home_team_final_score` int(5) NULL,
`away_team_final_score` int(5) NULL,
`game_date` date NULL,
`remarks` text NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `Statistics` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`player_id` int(11) NOT NULL,
`game_id` int(11) NOT NULL,
`created` datetime NULL ON UPDATE CURRENT_TIMESTAMP,
`points` int(5) NULL,
`blocks` int(5) NULL,
`steals` int(5) NULL,
`rebounds` int(5) NULL,
PRIMARY KEY (`id`) 
);


ALTER TABLE `Cities` ADD CONSTRAINT `city_country_fk` FOREIGN KEY (`country_id`) REFERENCES `Countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Teams` ADD CONSTRAINT `team_city_fk` FOREIGN KEY (`city_id`) REFERENCES `Cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Games` ADD CONSTRAINT `game_home_team_fk` FOREIGN KEY (`home_team_id`) REFERENCES `Teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Games` ADD CONSTRAINT `game_away_team_fk` FOREIGN KEY (`away_team_id`) REFERENCES `Teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `Statistics` ADD CONSTRAINT `player_statistics_fk` FOREIGN KEY (`player_id`) REFERENCES `Players` (`id`);
ALTER TABLE `Statistics` ADD CONSTRAINT `game_statistics_fk` FOREIGN KEY (`game_id`) REFERENCES `Games` (`id`);
ALTER TABLE `Teams` ADD CONSTRAINT `player_team_fk` FOREIGN KEY (`player_id`) REFERENCES `Players` (`id`);

